// ============================================
//  GiftGenie — Main JavaScript
//  Handles UI interactions + API calls
// ============================================

const App = (() => {

    // ------ State ------
    const state = {
        savedGifts:   [],   // { id, name, emoji, why, cost, effort, type }
        currentGifts: [],
        isLoading:    false,
        currentOccasion: '',
        currentMode:     'thoughtful',
    };

    // ------ DOM References ------
    const $ = id => document.getElementById(id);

    // ------ Budget Slider ------
    function initBudgetSlider() {
        const slider  = $('budget');
        const display = $('budget-out');

        function update() {
            const val = parseInt(slider.value);
            const pct = ((val - slider.min) / (slider.max - slider.min)) * 100;
            slider.style.setProperty('--pct', pct + '%');
            display.textContent = 'R' + val;
        }

        slider.addEventListener('input', update);
        update();
    }

    // ------ Generate Gifts ------
    async function generate() {
        const occasion  = $('occasion').value;
        const recipient = $('recipient').value.trim();
        const budget    = $('budget').value;
        const mode      = document.querySelector('input[name="mode"]:checked')?.value || 'thoughtful';

        if (!occasion) {
            showError('Please choose an occasion to get started.');
            return;
        }

        state.currentOccasion = occasion;
        state.currentMode     = mode;
        state.isLoading       = true;

        $('gen-btn').disabled = true;
        renderLoading();

        try {
            const res = await fetch('php/generate.php', {
                method:  'POST',
                headers: { 'Content-Type': 'application/json' },
                body:    JSON.stringify({ occasion, recipient, budget, mode }),
            });

            const data = await res.json();

            if (data.error) { showError(data.error); return; }

            state.currentGifts = data.gifts;
            renderGifts(data.gifts, occasion, mode);

        } catch (err) {
            showError('Could not reach the server. Please check your connection.');
        } finally {
            state.isLoading       = false;
            $('gen-btn').disabled = false;
        }
    }

    // ------ Render Loading ------
    function renderLoading() {
        $('results-area').innerHTML = `
            <div class="loading-wrap">
                <div class="loading-ribbon">
                    <div class="loading-dot"></div>
                    <div class="loading-dot"></div>
                    <div class="loading-dot"></div>
                </div>
                <p class="loading-text">Curating the perfect ideas for you…</p>
            </div>`;
    }

    // ------ Render Gift Cards ------
    function renderGifts(gifts, occasion, mode) {
        const modeLabel = mode === 'thoughtful' ? 'Thoughtful picks' : 'Convenient picks';
        const formatted = occasion.charAt(0).toUpperCase() + occasion.slice(1);

        const cardsHTML = gifts.map((g, i) => {
            const isSaved = state.savedGifts.some(s => s.name === g.name);
            const priceClass = g.price_status ? `price-${g.price_status}` : '';
            const priceLabel = g.price_status === 'budget_friendly' ? '💰 Budget-friendly' :
                              g.price_status === 'within_budget' ? '✅ Within budget' :
                              g.price_status === 'over_budget' ? '⚠️ Over budget' : '';

            return `
            <div class="gift-card ${isSaved ? 'is-saved' : ''} ${priceClass}" id="gc-${i}">
                <div class="gift-emoji-wrap">${g.emoji || '🎁'}</div>
                <div class="gift-body">
                    <div class="gift-name">${escHtml(g.name)}</div>
                    <div class="gift-why">${escHtml(g.why)}</div>
                    <div class="gift-tags">
                        <span class="tag tag-cost">${escHtml(g.cost)}</span>
                        <span class="tag tag-effort">${escHtml(g.effort)}</span>
                        <span class="tag tag-type">${escHtml(g.type)}</span>
                        ${priceLabel ? `<span class="tag tag-price-status">${priceLabel}</span>` : ''}
                    </div>
                </div>
                <button class="save-btn" title="${isSaved ? 'Remove' : 'Save'} gift"
                    onclick="App.toggleSave(${i})">${isSaved ? '♥' : '♡'}</button>
            </div>`;
        }).join('');

        $('results-area').innerHTML = `
            <div class="results-header">
                <div>
                    <div class="results-title">${modeLabel}</div>
                    <div class="results-subtitle">for ${formatted}</div>
                </div>
                <button class="btn-refresh" onclick="App.generate()">Refresh ↻</button>
            </div>
            <div class="gift-list">${cardsHTML}</div>`;
    }

    // ------ Toggle Save ------
    async function toggleSave(i) {
        const gift      = state.currentGifts[i];
        const savedIdx  = state.savedGifts.findIndex(s => s.name === gift.name);
        const card      = document.getElementById('gc-' + i);
        const btn       = card?.querySelector('.save-btn');

        if (savedIdx !== -1) {
            // Remove
            const giftId = state.savedGifts[savedIdx].dbId;
            state.savedGifts.splice(savedIdx, 1);
            card?.classList.remove('is-saved');
            if (btn) { btn.textContent = '♡'; btn.title = 'Save gift'; }

            await apiSaveGift({ action: 'remove', gift_id: giftId });
        } else {
            // Save
            card?.classList.add('is-saved');
            if (btn) { btn.textContent = '♥'; btn.title = 'Remove gift'; }

            const payload = {
                action:      'save',
                gift_name:   gift.name,
                gift_why:    gift.why,
                gift_cost:   gift.cost,
                gift_effort: gift.effort,
                gift_type:   gift.type,
                occasion:    state.currentOccasion,
                mode:        state.currentMode,
            };

            const result = await apiSaveGift(payload);
            state.savedGifts.push({ ...gift, dbId: result?.gift_id || null });
        }

        renderSavedPanel();
    }

    // ------ API: Save/Remove Gift ------
    async function apiSaveGift(payload) {
        try {
            const res  = await fetch('php/save_gift.php', {
                method:  'POST',
                headers: { 'Content-Type': 'application/json' },
                body:    JSON.stringify(payload),
            });
            return await res.json();
        } catch {
            return null;
        }
    }

    // ------ Render Saved Panel ------
    function renderSavedPanel() {
        const area = $('saved-area');
        if (state.savedGifts.length === 0) { area.innerHTML = ''; return; }

        const pillsHTML = state.savedGifts.map(g => `
            <span class="saved-pill">
                <span class="saved-pill-icon">${g.emoji || '🎁'}</span>
                ${escHtml(g.name)}
                <button class="btn-remove-saved" onclick="App.removeSaved('${escHtml(g.name).replace(/'/g, "\\'")}')">✕</button>
            </span>`).join('');

        area.innerHTML = `
            <div class="saved-panel">
                <div class="saved-panel-title">✦ Your shortlist</div>
                <div class="saved-pills">${pillsHTML}</div>
            </div>`;
    }

    // ------ Remove from Saved ------
    function removeSaved(name) {
        const idx = state.savedGifts.findIndex(g => g.name === name);
        if (idx === -1) return;

        const giftId = state.savedGifts[idx].dbId;
        state.savedGifts.splice(idx, 1);

        // Re-sync card UI if visible
        state.currentGifts.forEach((g, i) => {
            if (g.name === name) {
                const card = document.getElementById('gc-' + i);
                const btn  = card?.querySelector('.save-btn');
                card?.classList.remove('is-saved');
                if (btn) { btn.textContent = '♡'; btn.title = 'Save gift'; }
            }
        });

        if (giftId) apiSaveGift({ action: 'remove', gift_id: giftId });
        renderSavedPanel();
    }

    // ------ Show Error ------
    function showError(msg) {
        const area = $('results-area');
        area.innerHTML = `<div class="error-box">${escHtml(msg)}</div>`;
    }

    // ------ Utility ------
    function escHtml(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');
    }

    // ------ Load saved gifts from DB on page load ------
    async function loadSaved() {
        try {
            const res  = await fetch('php/get_saved.php');
            const data = await res.json();
            if (data.saved?.length) {
                state.savedGifts = data.saved.map(g => ({
                    name:    g.gift_name,
                    why:     g.gift_why,
                    cost:    g.gift_cost,
                    effort:  g.gift_effort,
                    type:    g.gift_type,
                    emoji:   '🎁',
                    dbId:    g.id,
                }));
                renderSavedPanel();
            }
        } catch { /* silent */ }
    }

    // ------ Init ------
    function init() {
        initBudgetSlider();
        loadSaved();

        // Enter key triggers generate
        $('recipient')?.addEventListener('keydown', e => {
            if (e.key === 'Enter') generate();
        });
    }

    // ------ Public API ------
    return { init, generate, toggleSave, removeSaved };

})();

document.addEventListener('DOMContentLoaded', App.init);
