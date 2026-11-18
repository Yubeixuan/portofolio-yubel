<?php

return [
    'meta' => [
        'title' => 'Yubel Hakinen Joshua Lita — Data Analyst & IT Business Analyst',
        'description' => 'Computer Science student at BINUS turning data into business insight. Portfolio of data analytics and information system projects, plus hands-on experience running a family rental property business.',
    ],

    'nav' => [
        'about' => 'About',
        'projects' => 'Projects',
        'experience' => 'Experience',
        'skills' => 'Skills',
        'contact' => 'Contact',
        'menu' => 'Open menu',
        'switch_label' => 'Ganti ke Bahasa Indonesia',
        'switch' => 'ID',
    ],

    'hero' => [
        'badge' => 'Whatever company needs me to be or do',
        'name' => 'Yubel Hakinen Joshua Lita',
        'roles' => ['Data Analyst', 'IT Business Analyst', 'Financial Analysis'],
        'title_a' => 'Turning data into',
        'title_b' => 'business insight.',
        'subtitle' => 'Computer Science student at BINUS who enjoys working with people in business, especially in finance. Focused on data analytics and IT business analysis.',
        'cta_projects' => 'View Projects',
        'cta_contact' => 'Contact Me',
        'cta_cv' => 'Download CV',
        'cta_cv_view' => 'View CV',
        'scroll' => 'Scroll',
        'chart_eyebrow' => 'Data profiling',
        'chart_title' => 'Online Retail II',
        'chart_sub' => 'From the Market Basket Analysis project — 1.07 million transaction rows',
        'chart_clean' => 'Clean rows',
        'chart_dup' => 'Duplicate rows',
        'chart_dup_value' => '34,335 rows (~3.2%)',
        'chart_clean_value' => 'remaining rows (~96.8%)',
        'chart_default' => 'Hover a bar to see details',
        'chart_cancel' => 'Cancellation invoices identified',
        'chart_cancel_value' => '8,292',
    ],

    'about' => [
        'eyebrow' => 'About Me',
        'title_a' => 'A Curious',
        'title_b' => 'Student',
        'title_c' => 'Who Loves Learning',
        'p1' => 'I am a 5th-semester Computer Science student at Bina Nusantara University with a strong interest in data analytics, IT business analysis, and web development. I believe the best technology is easy to use and has a positive impact on society.',
        'p2' => 'Since 2019, I have supported the operations of my family\'s 29-room rental property business, which taught me to understand business from both the financial and operational sides. Outside of class, I also build websites for friends who run their own businesses.',
        'stats' => [
            ['3.18', 'GPA (through semester 4)'],
            ['6', 'Web, mobile & data projects'],
            ['29', 'Rental rooms supported since 2019'],
            ['C1–C2', 'English (certified)'],
        ],
    ],

    'projects' => [
        'eyebrow' => 'Projects',
        'title_a' => 'Selected',
        'title_b' => 'Projects',
        'filters' => ['all' => 'All', 'data' => 'Data', 'web' => 'Web', 'app' => 'Apps'],
        'filter_label' => 'Filter projects',
        'case_cta' => 'View case study',
        'items' => [
            'market' => [
                'title' => 'Market Basket Analysis & Demand Forecasting',
                'period' => 'Sep 2026 – Present',
                'desc' => 'Big Data Analytics team project (4 members) on reducing overstock waste in small online retail, aligned with UN SDG 12. I developed all the code and the report, and serve as lead presenter.',
                'extra' => 'Profiled the Online Retail II dataset (1.07 million transaction rows) and identified 34,335 duplicate rows and 8,292 cancellation invoices for cleaning; applying association rule mining and time series forecasting to generate business recommendations. The proposal includes a 15-article literature review, and interactive dashboards are built in Power BI and Tableau to visualize sales patterns and forecasts.',
            ],
            'debouquets' => [
                'title' => 'DeBouquets',
                'period' => 'Feb 2026 – Jul 2026',
                'desc' => 'DeBouquets is a business selling flower bouquets with a custom order service.',
                'extra' => 'I designed the website UI in Figma (catalog, custom order, and login), modeled system requirements with UML, and coordinated all respondents for user acceptance testing (UAT).',
            ],
            'eunoia' => [
                'title' => 'Eunoia',
                'period' => 'Sep 2025 – Jan 2026',
                'desc' => 'An AI mental health companion app for youth.',
                'extra' => 'My role was testing the AI to find bugs and weaknesses in its responses, and tracking the findings for improvement.',
            ],
            'eperpus' => [
                'title' => 'E-Perpustakaan',
                'period' => 'Sep 2025 – Jan 2026',
                'desc' => 'An admin-based library management application with login and book data management (add, view, and list books by type and publisher).',
                'extra' => 'I also analyzed the MySQL database to check for overlapping or redundant data.',
            ],
            'predatoria' => [
                'title' => 'Predatoria',
                'period' => 'Jan 2025 – Jun 2025',
                'desc' => 'Predatoria started from a problem in science learning: biodiversity and wildlife conservation topics tend to be less engaging for elementary school students.',
                'extra' => 'Features: mini quizzes, an AR library, daily missions, and level progression, plus user accounts (login and delete account). User experience was evaluated with the User Experience Questionnaire (UEQ).',
            ],
            'ishowkost' => [
                'title' => 'IShowKost',
                'period' => 'Sep 2024 – Dec 2024',
                'desc' => 'IShowKost uses technology to grow from a boarding house search app into one that lets prospective tenants book a room and pay rent.',
                'extra' => 'A responsive website for finding boarding houses by location, type, and date, with promo listings. Code managed on GitHub.',
            ],
        ],
    ],

    'case' => [
        'eyebrow' => 'Case study',
        'close' => 'Close',
        'meta' => 'Big Data Analytics · Team of 4 · Sep 2026 – Present',
        'problem_h' => 'Problem',
        'problem' => 'Small online shops run on limited capital. Excess stock ties up cash in slow-moving items, takes up warehouse space, and risks becoming waste. Without a demand forecast, restocking is a guess — a topic tied to SDG 12 (responsible consumption and production).',
        'role_h' => 'My role',
        'role' => [
            'Wrote all the code (Python, Jupyter) and the project report.',
            'Lead presenter for the 4-person team.',
            'Wrote the proposal with a 15-article literature review.',
            'Built interactive dashboards in Power BI and Tableau.',
        ],
        'approach_h' => 'Approach',
        'approach' => [
            'Profiled the Online Retail II dataset (1.07 million transaction rows): identified 34,335 duplicate rows and 8,292 cancellation invoices for cleaning.',
            'Association rule mining to find products frequently bought together.',
            'Time series forecasting: compared three methods (Linear Trend, Naive same-day-last-week, and 4-week Seasonal SMA) on daily demand.',
        ],
        'findings_h' => 'Findings',
        'findings' => [
            'Products from the same series or category tend to be bought together.',
            'Among the three methods on the dashboard, Linear Trend was the most accurate.',
        ],
        'table_title' => 'Forecast accuracy (units per day, all days — lower is better)',
        'table_method' => 'Method',
        'table_best' => 'Best',
        'table_rows' => [
            ['Linear Trend', '100', '115', true],
            ['4-week Seasonal SMA', '107', '129', false],
            ['Naive (same day last week)', '136', '165', false],
        ],
        'table_note' => 'On open days only, Linear Trend improves to MAE 92 and RMSE 108.',
        'reco_h' => 'Business recommendations',
        'reco' => [
            'Create bundles for product pairs that are often bought together (for example, one series sold as one pack).',
            'Show paired products side by side on product pages as “frequently bought together”.',
            'Schedule weekly restocking based on the Linear Trend forecast, so stock follows demand instead of gut feeling.',
        ],
        'tools_h' => 'Tools',
        'dash_h' => 'Dashboard',
        'dash_caption' => 'Daily forecast vs actual, top 10 association rules by lift, top products, and revenue by country.',
        'zoom_hint' => 'Click the image to zoom',
        'load_embed' => 'Load interactive dashboard',
        'open_tableau' => 'Open on Tableau Public',
        'open_image' => 'Open full image',
        'embed_note' => 'The dashboard loads from Tableau Public only when you press the button.',
    ],

    'experience' => [
        'eyebrow' => 'Experience',
        'title_a' => 'My',
        'title_b' => 'Background',
        'work_heading' => 'Work',
        'work' => [
            'role' => 'Operations & Finance Assistant',
            'org' => 'Family Rental Property Business · Boarding House & Rental Homes',
            'period' => '2019 – Present',
            'bullets' => [
                'Assist with tenant management, billing, financial records, and daily operations across 29 rooms.',
                'Handle tenant communication and resolve maintenance and payment issues.',
                'The business expanded from a 20-room boarding house to 29 rooms; currently scouting land to build a new one.',
            ],
            'chart_title' => 'Business growth',
            'chart_a' => 'Original boarding house',
            'chart_a_value' => '20 rooms',
            'chart_b' => 'Added rooms',
            'chart_b_value' => '9 rooms',
            'chart_default' => '29 rooms in total — hover a bar',
        ],
        'org_heading' => 'Organizations',
        'orgs' => [
            [
                'role' => 'Media Team',
                'org' => 'Porsinara BINUS',
                'period' => 'Jul 2025 – Oct 2025',
                'bullets' => ['Produced video and photo documentation during event activities.'],
            ],
            [
                'role' => 'OSIS (Student Council) — Media Division',
                'org' => 'Sekolah Kristen Kalam Kudus',
                'period' => '2022 – 2024',
                'bullets' => [
                    'Handled all editing for school promotion and school activities.',
                    'Managed event execution for every major school activity.',
                ],
            ],
        ],
        'edu_heading' => 'Education',
        'edu' => [
            [
                'role' => 'BINUS University — Bachelor of Computer Science',
                'period' => 'Sep 2024 – Present',
                'bullets' => [
                    'GPA 3.18/4.00 (through semester 4).',
                    'Relevant coursework: Big Data Analytics for Business, Software Development, Agile Software Development.',
                ],
            ],
            [
                'role' => 'Sekolah Kristen Kalam Kudus — High School Diploma, Science',
                'period' => 'Jul 2021 – May 2024',
                'bullets' => ['Winner, National Science Olympiad (OSN) Informatics, District/City Level, Papua (2022).'],
            ],
        ],
        'cert_heading' => 'Certifications',
        'certs' => [
            'English for Market Research & Business Communication (C2.2)',
            'English for Professional Office (C1.2)',
        ],
    ],

    'skills' => [
        'eyebrow' => 'Skills',
        'title_a' => 'What I',
        'title_b' => 'Work With',
        'groups' => [
            ['Data & Analytics', 'fa-chart-column', ['Python', 'Jupyter', 'Power BI', 'Tableau', 'Data Preparation', 'Association Rule Mining', 'Time Series Forecasting', 'MySQL']],
            ['Web & Tools', 'fa-code', ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'React.js', 'Figma', 'GitHub', 'Mobile App Development']],
            ['Business & Analysis', 'fa-diagram-project', ['IT Business Analysis', 'Financial Analysis', 'UML', 'User Acceptance Testing (UAT)', 'UEQ', 'Software Testing', 'Bug Tracking']],
            ['Other', 'fa-users', ['Teamwork', 'Public Speaking', 'Photography', 'Photo & Video Editing', 'English (C1–C2)', 'Indonesian (Native)']],
        ],
    ],

    'contact' => [
        'eyebrow' => 'Contact',
        'title_a' => "Let's",
        'title_b' => 'Connect!',
        'heading' => 'Get in Touch',
        'text' => 'I am open to internships, freelance work, or just a chat about technology and business. Feel free to reach out!',
    ],

    'footer' => '© :year — made with a happy heart ;)',
];
