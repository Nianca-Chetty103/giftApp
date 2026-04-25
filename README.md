# 🎁 GiftGenie — Gift Idea Generator

A warm, elegant web app that generates personalised gift ideas using AI.
Choose between **Thoughtful** (handwritten notes, keepsakes, experiences) or **Convenient** (ready-to-buy) gifts.

## How it benefits the community 
well I wasn't very good with picking gifts myself, Taking unless amounts of time to think about a gift and still be thinking about gift the day before you need one. So decided to make it a little more simplier.

## What I Improved 
- improved my skills for JavaScript and php coding.
- improving my idea of a good aesthetic when it comes to coding the frontend.

---

## Project Structure

```
giftgenie/
├── index.html          ← Main page (HTML)
├── database.sql        ← MySQL schema (run once to set up)
├── css/
│   └── style.css       ← All styles (CSS)
├── js/
│   └── app.js          ← Client-side logic (JavaScript)
└── php/
    ├── config.php      ← DB connection + API key (PHP)
    ├── generate.php    ← POST: generate gift ideas via Anthropic API
    ├── save_gift.php   ← POST: save or remove a gift
    └── get_saved.php   ← GET: fetch saved gifts for current session
```

---

## Setup Instructions

### 1. Database
```sql
-- In MySQL / phpMyAdmin, run:
source database.sql
```
This creates the `giftgenie` database with three tables:
- `users` — user accounts
- `saved_gifts` — gifts saved per user
- `generation_log` — analytics on each generation

### 2. Configure PHP
Edit `php/config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_mysql_username');
define('DB_PASS', 'your_mysql_password');
define('DB_NAME', 'giftgenie');
define('ANTHROPIC_API_KEY', 'sk-ant-...');  // Your Anthropic API key
```

Get your Anthropic API key at: https://console.anthropic.com

### 3. Deploy
- **Local**: Use XAMPP, WAMP, MAMP, or Laragon. Place the `giftgenie/` folder in `htdocs/`.
- **Live**: Upload files to any PHP 8.0+ host with MySQL and cURL enabled.

### 4. Visit
Open `http://localhost/giftgenie/` in your browser.

---

## Tech Stack

| Layer      | Technology                        |
|------------|-----------------------------------|
| Frontend   | HTML5, CSS3 (custom, no framework)|
| JavaScript | Vanilla JS (ES2020 modules)       |
| Backend    | PHP 8.0+                          |
| Database   | MySQL 8.0+ via PDO                |
| AI         | Anthropic Claude API              |

---

## Features 🎁
- Two gift modes: **Thoughtful** vs **Convenient**
- AI-powered ideas tailored to occasion, recipient description & budget
- Save gifts to a shortlist (persisted in MySQL)
- Session-based user tracking (extend with login for multi-user)
- Refresh for a fresh batch any time
- Fully responsive for mobile

---

## Extending the App
- Add a login/registration page using the `users` table
- Add email export of saved gifts
- Add gift tracking (bought / still deciding)
- Add an admin dashboard to view generation_log analytics


