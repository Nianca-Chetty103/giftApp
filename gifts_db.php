<?php
// ============================================
//  GiftGenie — Mock Gift Database
//  Pre-curated gift suggestions by occasion
// ============================================

function getGiftSuggestions(string $occasion, string $mode): array {
    $gifts = [
        'birthday' => [
            'thoughtful' => [
                ['name' => 'Custom Memory Book', 'why' => 'A beautifully bound album of shared memories, photos, and handwritten messages from loved ones. Personal and timeless.', 'cost' => 'R150–R300', 'effort' => 'Some effort', 'type' => 'Personalised', 'emoji' => '📖'],
                ['name' => 'Handwritten Letter Series', 'why' => 'Letters from friends and family to be opened on tough days. Deeply meaningful and costs nothing but time.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '💌'],
                ['name' => 'Experience Day (Hiking/Picnic)', 'why' => 'Quality time creating new memories together. More valuable than any object and tailored to their interests.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'Experience', 'emoji' => '🥾'],
                ['name' => 'Engraved Wooden Box', 'why' => 'A keepsake box with their name or a meaningful date engraved. Perfect for storing treasures and memories.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Keepsake', 'emoji' => '📦'],
                ['name' => 'Coupon Book (Home-made)', 'why' => 'Fun, creative coupons for dinners, movie nights, help with chores. Personal and immediately usable.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '🎫'],
            ],
            'convenient' => [
                ['name' => 'Luxury Candle Set', 'why' => 'High-quality scented candles from a trusted brand. Elegant, universally appreciated, and easy to gift.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🕯️'],
                ['name' => 'Wireless Earbuds', 'why' => 'Practical, trendy, and universally useful. Great for music, calls, and everyday enjoyment.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🎧'],
                ['name' => 'Cozy Blanket/Throw', 'why' => 'Soft, comfortable, and perfect for relaxation. Available in many colours and styles online.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🛏️'],
                ['name' => 'Premium Coffee/Tea Set', 'why' => 'For the caffeine enthusiast. Specialty beans or loose-leaf teas with a nice mug make a delightful combo.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '☕'],
                ['name' => 'Spotify/Apple Music Gift Card', 'why' => 'Give them unlimited music. Available instantly online and works for any music lover.', 'cost' => 'R50–R300', 'effort' => 'Easy', 'type' => 'Digital', 'emoji' => '🎵'],
            ],
        ],
        'wedding' => [
            'thoughtful' => [
                ['name' => 'Custom Recipe Book', 'why' => 'Compile family recipes in a beautifully bound book. A culinary heirloom they\'ll treasure forever.', 'cost' => 'R150–R300', 'effort' => 'Some effort', 'type' => 'Personalised', 'emoji' => '📚'],
                ['name' => 'Date Night Experience Plan', 'why' => 'Plan and organize surprise date nights for their first year. Include locations, restaurant names, and fun ideas.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'Experience', 'emoji' => '💑'],
                ['name' => 'Wedding Video Montage', 'why' => 'Compile clips from loved ones sharing marriage advice or funny stories. Deeply personal and emotional.', 'cost' => 'R150–R300', 'effort' => 'High effort', 'type' => 'Personalised', 'emoji' => '🎬'],
                ['name' => 'Memory Jar for the First Year', 'why' => 'Pre-filled with date ideas, conversation starters, and anniversary reminder cards. Thoughtful and interactive.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '🏺'],
                ['name' => 'His & Hers Experience (Spa/Adventure)', 'why' => 'A couples spa day or adventure activity. Quality time celebrating their new journey together.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '💆'],
            ],
            'convenient' => [
                ['name' => 'Luxury Bedding Set', 'why' => 'High-thread-count Egyptian cotton sheets. Practical for newlyweds setting up their home.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🛏️'],
                ['name' => 'Premium Wine Collection', 'why' => 'A curated selection of wines to cellar or enjoy. Elegant and celebratory.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🍷'],
                ['name' => 'Engraved Picture Frame (12x14)', 'why' => 'A beautiful frame for their wedding photo with their names and date engraved on the side.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Keepsake', 'emoji' => '🖼️'],
                ['name' => 'Mr & Mrs Couple Mugs', 'why' => 'Cute, functional, and perfect for their morning coffee together. Available in various fun designs.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '☕'],
                ['name' => 'Honeymoon Fund Gift Card', 'why' => 'Direct contribution to their dream honeymoon. Practical and immediately appreciated.', 'cost' => 'Any budget', 'effort' => 'Easy', 'type' => 'Digital', 'emoji' => '🌍'],
            ],
        ],
        'anniversary' => [
            'thoughtful' => [
                ['name' => 'Renewal of Vows Experience', 'why' => 'Organize a small, intimate ceremony renewing their vows. Deeply romantic and memorable.', 'cost' => 'R300+', 'effort' => 'High effort', 'type' => 'Experience', 'emoji' => '💍'],
                ['name' => 'Love Letters Box', 'why' => 'Collect handwritten love notes from friends and family expressing what the couple means to them.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '💌'],
                ['name' => 'Couples Cooking Class', 'why' => 'A fun activity learning to cook a new cuisine together. Memorable experience and new skills.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '👨‍🍳'],
                ['name' => 'Engraved Watch for Him', 'why' => 'A classic timepiece engraved with initials or anniversary date on the back. Timeless and practical.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Keepsake', 'emoji' => '⌚'],
                ['name' => 'Anniversary Photo Session', 'why' => 'Professional photographer for a romantic shoot. Captures their love and creates lasting memories.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '📷'],
            ],
            'convenient' => [
                ['name' => 'Weekend Getaway Package', 'why' => 'Pre-booked hotel stay with dinner reservations. Convenient, romantic, and ready to go.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '🏨'],
                ['name' => 'His & Hers Perfume Set', 'why' => 'Luxury fragrances from a renowned brand. Elegant, personal, and available online.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '💐'],
                ['name' => 'Couple\'s Spa Gift Voucher', 'why' => 'Massage and relaxation experience together. Convenient to book and immediately relaxing.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '💆'],
                ['name' => 'Premium Champagne & Chocolates', 'why' => 'Luxury bubbly with gourmet chocolates for a romantic evening at home. Easily available and elegant.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🍾'],
                ['name' => 'Digital Photo Frame', 'why' => 'Load it with years of memories together. Modern, functional, and emotional.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '📸'],
            ],
        ],
        'christmas' => [
            'thoughtful' => [
                ['name' => 'Advent Calendar (Homemade)', 'why' => 'Fill 25 days with small treats, love notes, or activities. Personal and builds anticipation.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '📅'],
                ['name' => 'Charity Donation in Their Name', 'why' => 'Support a cause they care about. Meaningful, generous, and makes a real-world impact.', 'cost' => 'Any budget', 'effort' => 'Easy', 'type' => 'Keepsake', 'emoji' => '❤️'],
                ['name' => 'Custom Ornament with Photo', 'why' => 'A keepsake ornament featuring their family photo or favourite memory. Decorative and sentimental.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '🎄'],
                ['name' => 'Year in Photos Album', 'why' => 'Compile the best moments from the past year into a beautiful album. A gift of memories.', 'cost' => 'R150–R300', 'effort' => 'Some effort', 'type' => 'Personalised', 'emoji' => '📸'],
                ['name' => 'Experience Certificate (Activity)', 'why' => 'Concert tickets, escape room, adventure activity, or class. Something they\'ll remember all year.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '🎫'],
            ],
            'convenient' => [
                ['name' => 'Luxury Gift Hamper', 'why' => 'Pre-assembled basket with gourmet foods, wines, and festive treats. Ready to give and beautifully presented.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🎁'],
                ['name' => 'Smart Home Device (Echo/Google)', 'why' => 'Voice-controlled convenience for music, weather, shopping, and smart home control. Modern and useful.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🔊'],
                ['name' => 'Festive Candle Collection', 'why' => 'Scented Christmas candles from a luxury brand. Seasonal, aromatic, and widely available.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🕯️'],
                ['name' => 'Premium Chocolate Assortment', 'why' => 'Gourmet truffles or pralines from a renowned chocolatier. Indulgent, timeless, and universally loved.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🍫'],
                ['name' => 'Subscription Box (3-month)', 'why' => 'Coffee, wine, books, or snacks delivered monthly. Convenience and ongoing enjoyment throughout the season.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Digital', 'emoji' => '📦'],
            ],
        ],
        'graduation' => [
            'thoughtful' => [
                ['name' => 'Career Vision Scrapbook', 'why' => 'Compile goals, dreams, inspirational quotes, and photos representing their future path. Motivational keepsake.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '📖'],
                ['name' => 'Personalized Journal', 'why' => 'A leather-bound journal with their name engraved, for capturing thoughts as they start their career.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '📔'],
                ['name' => 'Advice Letter from Mentors', 'why' => 'Collect letters from teachers, mentors, and family offering wisdom for their next chapter.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '💌'],
                ['name' => 'Celebration Dinner or Outing', 'why' => 'Take them to their favourite restaurant or on a special adventure to celebrate this milestone.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '🍽️'],
                ['name' => 'Career Development Course Voucher', 'why' => 'Enroll them in an online course for a skill relevant to their chosen field. Invest in their future.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Digital', 'emoji' => '🎓'],
            ],
            'convenient' => [
                ['name' => 'Professional Watch', 'why' => 'A classic, quality timepiece suitable for their professional wardrobe. Practical and a lasting accessory.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '⌚'],
                ['name' => 'Premium Work Backpack', 'why' => 'Stylish, durable bag with laptop compartment. Essential for their commute and career start.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🎒'],
                ['name' => 'Personalized Desk Accessories', 'why' => 'Engraved pen set, name plaque, or desk organizer for their new office space.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '✏️'],
                ['name' => 'High-Tech Notebook Tablet', 'why' => 'Digital notebook device for organizing ideas and staying productive in meetings and class.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '📱'],
                ['name' => 'LinkedIn Premium or Professional Development Membership', 'why' => 'Subscription to career-building platforms. Instant access and immediately useful for job hunting.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Digital', 'emoji' => '💼'],
            ],
        ],
        'baby' => [
            'thoughtful' => [
                ['name' => 'Handmade Memory Box', 'why' => 'Collect mementos from family and friends sharing wishes for the baby\'s future. A precious keepsake.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '📦'],
                ['name' => 'Personalized Storybook', 'why' => 'A custom book featuring the baby\'s name and role in the story. Bedtime magic for years to come.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '📚'],
                ['name' => 'Custom Baby Milestone Cards', 'why' => 'Beautiful cards to photograph baby with at each month/year milestone. Creates a wonderful photo timeline.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '📸'],
                ['name' => 'Hand & Footprint Clay Kit', 'why' => 'Keepsake frame capturing baby\'s tiny hand and foot prints. Forever memorable and displays beautifully.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Keepsake', 'emoji' => '👶'],
                ['name' => 'Lullaby Music Box (Custom)', 'why' => 'A beautiful music box playing a lullaby, engraved with baby\'s name and birth date.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '🎵'],
            ],
            'convenient' => [
                ['name' => 'Premium Baby Gift Basket', 'why' => 'Pre-assembled with essentials: blankets, toys, toiletries. Convenient and comprehensive for new parents.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🎁'],
                ['name' => 'High-Quality Stroller Organizer', 'why' => 'Practical accessory for on-the-go parents. Easy to find essentials while keeping things tidy.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '👶'],
                ['name' => 'Luxury Nursery Bedding Set', 'why' => 'Soft, breathable cot sheets and blankets. Essential, safe, and high quality for precious sleep.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🛏️'],
                ['name' => 'Baby Monitor with Video', 'why' => 'Parents can watch and listen from anywhere. Peace of mind and cutting-edge convenience.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '📹'],
                ['name' => 'Monthly Milestone Photo Frame (Digital)', 'why' => 'Bluetooth-enabled frame for parents to display baby photos remotely. Modern and sentimental.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🖼️'],
            ],
        ],
        'valentines' => [
            'thoughtful' => [
                ['name' => 'Love Coupon Book', 'why' => 'Hand-drawn coupons for breakfast in bed, back massages, movie nights, and special favours.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '🎫'],
                ['name' => 'Scrapbook of Your Love Story', 'why' => 'Photos, ticket stubs, and heartfelt captions chronicling your relationship journey together.', 'cost' => 'R150–R300', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '📖'],
                ['name' => 'Romantic Picnic (Self-Prepared)', 'why' => 'Cook their favourite meal, pack it in a basket with flowers and candles for a surprise outdoor date.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'Experience', 'emoji' => '🧺'],
                ['name' => 'Love Letter Jar', 'why' => 'Fill a jar with 52 sealed love letters (one to read each week). Personal and touching.', 'cost' => 'Under R50', 'effort' => 'High effort', 'type' => 'DIY', 'emoji' => '🏺'],
                ['name' => 'Couples Weekend Escape (Planned)', 'why' => 'Research, book, and surprise them with an intimate getaway. Shows thought and dedication.', 'cost' => 'R300+', 'effort' => 'Some effort', 'type' => 'Experience', 'emoji' => '🏨'],
            ],
            'convenient' => [
                ['name' => 'Luxury Perfume Set (His & Hers)', 'why' => 'Premium fragrances from a renowned house. Romantic, personal, and available online.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '💐'],
                ['name' => 'Rose Gold Jewelry', 'why' => 'Elegant bracelet, necklace, or ring. Timeless, romantic, and fits any personal style.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '💎'],
                ['name' => 'Champagne & Chocolate Pairing', 'why' => 'Luxury bubbles with artisan chocolates for a sophisticated evening. Ready to go, beautifully packaged.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🍾'],
                ['name' => 'Spa Couple\'s Package', 'why' => 'Massage and relaxation treatments side by side. Instantly bookable and deeply pampering.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '💆'],
                ['name' => 'Dinner Reservation at Fine Dining', 'why' => 'Book at an upscale restaurant known for romance. Simple, elegant, and creates lasting memories.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '🍽️'],
            ],
        ],
        'mothers day' => [
            'thoughtful' => [
                ['name' => 'Memory Photo Collage (Framed)', 'why' => 'Curate meaningful photos of you together over the years arranged in a beautiful frame.', 'cost' => 'R150–R300', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '🖼️'],
                ['name' => 'Handwritten Recipe Card Set', 'why' => 'Collect and hand-write family recipes from her and grandmothers. A culinary legacy gift.', 'cost' => 'R50–R150', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '📋'],
                ['name' => 'Spa Day Together', 'why' => 'Book a mother-child spa experience. Quality time combined with relaxation and pampering.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '💆'],
                ['name' => 'Personalized Grandma (or Mom) Mug', 'why' => 'A mug featuring family photos or a heartfelt message. Practical and sentimental for daily use.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '☕'],
                ['name' => 'Breakfast in Bed (Prepared)', 'why' => 'Wake her with homemade pancakes, fresh fruit, and flowers. Simple but deeply meaningful.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'Experience', 'emoji' => '🍳'],
            ],
            'convenient' => [
                ['name' => 'Luxury Skincare Set', 'why' => 'Premium face creams and serums from a trusted brand. Pampering and easy to order online.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '💅'],
                ['name' => 'Silk Pillowcase & Robe Combo', 'why' => 'Soft, luxurious fabrics for comfort and beauty sleep. Thoughtful without much effort.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🛏️'],
                ['name' => 'Personalized Jewelry (Bracelet/Necklace)', 'why' => 'Engraved with her initials or a meaningful date. Timeless and close to her heart.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '💎'],
                ['name' => 'Flowers & Premium Chocolates', 'why' => 'Beautiful bouquet paired with gourmet truffles. Classic, elegant, and readily available.', 'cost' => 'R50–R150', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🌹'],
                ['name' => 'Afternoon Tea at a Fancy Hotel', 'why' => 'Book a table for the two of you at an upscale venue. Elegant, relaxing, and easy to arrange.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '☕'],
            ],
        ],
        'fathers day' => [
            'thoughtful' => [
                ['name' => 'Photo Frame with Your Memories', 'why' => 'Select your favourite photos together and create a custom frame. A daily reminder of your bond.', 'cost' => 'R150–R300', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '🖼️'],
                ['name' => 'Sports Event or Concert Tickets', 'why' => 'Surprise him with tickets to see his favourite team or artist live. An experience to remember.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '🎫'],
                ['name' => 'Handwritten Coupon Book', 'why' => 'Offer services: golf outings, BBQ prep, car wash, or just "one free hug". Personal and fun.', 'cost' => 'Under R50', 'effort' => 'Some effort', 'type' => 'DIY', 'emoji' => '🎫'],
                ['name' => 'Grilling or Hobby Masterclass', 'why' => 'Book a cooking class or workshop in his area of interest. Learn something together.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '👨‍🍳'],
                ['name' => 'Custom Tool or Hobby Item (Engraved)', 'why' => 'A quality item engraved with his name or a meaningful message. Practical and personal.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Personalised', 'emoji' => '🔧'],
            ],
            'convenient' => [
                ['name' => 'Premium Watch', 'why' => 'A stylish, quality timepiece. Practical, professional, and universally appreciated by men.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '⌚'],
                ['name' => 'Leather Wallet or Card Holder', 'why' => 'Durable, masculine accessory. Practical and available in many styles online.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '👝'],
                ['name' => 'Premium Tool Set', 'why' => 'High-quality tools for the DIY enthusiast. Useful and built to last.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🔨'],
                ['name' => 'Beer or Whiskey Collection', 'why' => 'Curated selection of his favourite craft beers or premium spirits. Perfect for enjoyment or gifting.', 'cost' => 'R150–R300', 'effort' => 'Easy', 'type' => 'Product', 'emoji' => '🍺'],
                ['name' => 'Barbecue or Outdoor Experience', 'why' => 'Steak dinner at a fine restaurant or glamping adventure. Convenient and memorable.', 'cost' => 'R300+', 'effort' => 'Easy', 'type' => 'Experience', 'emoji' => '🔥'],
            ],
        ],
    ];

    $occasion = strtolower($occasion);
    if (isset($gifts[$occasion][$mode])) {
        return $gifts[$occasion][$mode];
    }
    $birthdays = array_merge($gifts['birthday']['thoughtful'], $gifts['birthday']['convenient']);
    shuffle($birthdays);
    return array_slice($birthdays, 0, 5);
}
?>
