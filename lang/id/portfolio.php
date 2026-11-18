<?php

return [
    'meta' => [
        'title' => 'Yubel Hakinen Joshua Lita — Data Analyst & IT Business Analyst',
        'description' => 'Mahasiswa Computer Science BINUS yang mengubah data menjadi insight bisnis. Portofolio proyek analitik data, sistem informasi, dan pengalaman mengelola usaha properti keluarga.',
    ],

    'nav' => [
        'about' => 'Tentang',
        'projects' => 'Proyek',
        'experience' => 'Pengalaman',
        'skills' => 'Skill',
        'contact' => 'Kontak',
        'menu' => 'Buka menu',
        'switch_label' => 'Switch to English',
        'switch' => 'EN',
    ],

    'hero' => [
        'badge' => 'Whatever company needs me to be or do',
        'name' => 'Yubel Hakinen Joshua Lita',
        'roles' => ['Data Analyst', 'IT Business Analyst', 'Financial Analysis'],
        'title_a' => 'Mengubah data menjadi',
        'title_b' => 'insight bisnis.',
        'subtitle' => 'Mahasiswa Computer Science BINUS yang suka berinteraksi dengan orang dalam bisnis, terutama dalam finance. Fokus pada data analytics dan IT business analysis.',
        'cta_projects' => 'Lihat Projects',
        'cta_contact' => 'Hubungi Saya',
        'cta_cv' => 'Unduh CV',
        'cta_cv_view' => 'Lihat CV',
        'scroll' => 'Scroll',
        'chart_eyebrow' => 'Data profiling',
        'chart_title' => 'Online Retail II',
        'chart_sub' => 'Dari proyek Market Basket Analysis — 1,07 juta baris transaksi',
        'chart_clean' => 'Baris bersih',
        'chart_dup' => 'Baris duplikat',
        'chart_dup_value' => '34.335 baris (±3,2%)',
        'chart_clean_value' => 'sisa baris (±96,8%)',
        'chart_default' => 'Arahkan kursor ke bar untuk melihat detail',
        'chart_cancel' => 'Invoice pembatalan teridentifikasi',
        'chart_cancel_value' => '8.292',
    ],

    'about' => [
        'eyebrow' => 'Tentang Saya',
        'title_a' => 'Seorang',
        'title_b' => 'Mahasiswa',
        'title_c' => 'yang Ingin Tahu',
        'p1' => 'Saya mahasiswa semester 5 Computer Science di Universitas Bina Nusantara dengan minat besar pada data analytics, IT business analysis, dan web development. Saya percaya bahwa teknologi terbaik adalah yang mudah digunakan dan berdampak positif bagi masyarakat.',
        'p2' => 'Sejak 2019 saya membantu operasional usaha properti sewa keluarga dengan 29 kamar, yang melatih saya memahami bisnis dari sisi keuangan dan operasional. Di luar kuliah, saya juga membuka jasa pembuatan web untuk teman-teman yang sedang menjalankan usaha.',
        'stats' => [
            ['3.18', 'IPK (hingga semester 4)'],
            ['6', 'Proyek web, mobile & data'],
            ['29', 'Kamar sewa dikelola sejak 2019'],
            ['C1–C2', 'Bahasa Inggris (bersertifikat)'],
        ],
    ],

    'projects' => [
        'eyebrow' => 'Projects',
        'title_a' => 'Proyek',
        'title_b' => 'Pilihan Saya',
        'filters' => ['all' => 'Semua', 'data' => 'Data', 'web' => 'Web', 'app' => 'Aplikasi'],
        'filter_label' => 'Filter proyek',
        'case_cta' => 'Lihat studi kasus',
        'items' => [
            'market' => [
                'title' => 'Market Basket Analysis & Demand Forecasting',
                'period' => 'Sep 2026 – Sekarang',
                'desc' => 'Proyek Big Data Analytics (tim 4 orang) untuk mengurangi pemborosan overstock pada ritel online kecil, selaras dengan UN SDG 12. Saya menulis seluruh kode dan laporan serta menjadi presenter utama.',
                'extra' => 'Dataset Online Retail II (1,07 juta baris transaksi) diprofilkan dan ditemukan 34.335 baris duplikat serta 8.292 invoice pembatalan untuk dibersihkan, lalu dilanjutkan dengan association rule mining dan time series forecasting untuk rekomendasi bisnis. Proposal ditulis dengan tinjauan 15 artikel literatur, dan dashboard interaktif dibangun di Power BI dan Tableau untuk memvisualisasikan pola penjualan serta hasil forecast.',
            ],
            'debouquets' => [
                'title' => 'DeBouquets',
                'period' => 'Feb 2026 – Jul 2026',
                'desc' => 'DeBouquets merupakan usaha yang bergerak pada bidang penjualan bouquet bunga dan layanan custom order',
                'extra' => 'Saya merancang UI website di Figma (katalog, custom order, dan login), memodelkan kebutuhan sistem dengan UML, serta mengoordinasikan seluruh responden untuk user acceptance testing (UAT).',
            ],
            'eunoia' => [
                'title' => 'Eunoia',
                'period' => 'Sep 2025 – Jan 2026',
                'desc' => 'Aplikasi pendamping kesehatan mental berbasis AI untuk anak muda.',
                'extra' => 'Peran saya menguji AI untuk menemukan bug dan kelemahan pada responsnya, lalu mencatat temuan lewat bug tracking untuk perbaikan.',
            ],
            'eperpus' => [
                'title' => 'E-Perpustakaan',
                'period' => 'Sep 2025 – Jan 2026',
                'desc' => 'Aplikasi manajemen perpustakaan berbasis admin dengan login dan pengelolaan data buku (tambah, lihat, dan daftar berdasarkan jenis serta penerbit).',
                'extra' => 'Saya juga menganalisis database MySQL untuk memastikan tidak ada data yang tumpang tindih atau redundan.',
            ],
            'predatoria' => [
                'title' => 'Predatoria',
                'period' => 'Jan 2025 – Jun 2025',
                'desc' => 'Predatoria berangkat dari permasalahan dalam proses pembelajaran sains, khususnya dalam topik keanekaragaman hayati dan konservasi satwa liar, yang cenderung kurang diminati oleh siswa sekolah dasar.',
                'extra' => 'Fitur: mini kuis, AR library, misi harian, dan level progression, plus akun pengguna (login dan hapus akun). Pengalaman pengguna dievaluasi dengan User Experience Questionnaire (UEQ).',
            ],
            'ishowkost' => [
                'title' => 'IShowKost',
                'period' => 'Sep 2024 – Des 2024',
                'desc' => 'IshowKost memanfaatkan teknologi untuk berkembang dari aplikasi cari kos menjadi aplikasi yang memudahkan calon anak kos untuk booking properti kos dan juga melakukan pembayaran kos.',
                'extra' => 'Website responsif untuk mencari kos berdasarkan lokasi, tipe, dan tanggal, lengkap dengan listing promo. Kode dikelola di GitHub.',
            ],
        ],
    ],

    'case' => [
        'eyebrow' => 'Studi kasus',
        'close' => 'Tutup',
        'meta' => 'Big Data Analytics · Tim 4 orang · Sep 2026 – Sekarang',
        'problem_h' => 'Masalah',
        'problem' => 'Toko online kecil bermodal terbatas. Stok berlebih mengunci uang pada barang yang lambat laku, memakan ruang gudang, dan berisiko menjadi limbah. Tanpa prakiraan permintaan, restock hanya ditebak, padahal topik ini terkait SDG 12 (konsumsi dan produksi yang bertanggung jawab).',
        'role_h' => 'Peran saya',
        'role' => [
            'Menulis seluruh kode (Python, Jupyter) dan laporan proyek.',
            'Menjadi presenter utama untuk tim 4 orang.',
            'Menulis proposal dengan tinjauan 15 artikel literatur.',
            'Membangun dashboard interaktif di Power BI dan Tableau.',
        ],
        'approach_h' => 'Pendekatan',
        'approach' => [
            'Profiling dataset Online Retail II (1,07 juta baris transaksi): ditemukan 34.335 baris duplikat dan 8.292 invoice pembatalan untuk dibersihkan.',
            'Association rule mining untuk menemukan produk yang sering dibeli bersamaan.',
            'Time series forecasting: membandingkan tiga metode (Linear Trend, Naive hari yang sama minggu lalu, dan Seasonal SMA 4 minggu) pada permintaan harian.',
        ],
        'findings_h' => 'Temuan',
        'findings' => [
            'Produk dalam satu seri atau kategori yang sama cenderung dibeli bersamaan.',
            'Di antara tiga metode pada dashboard, Linear Trend paling akurat.',
        ],
        'table_title' => 'Akurasi forecasting (unit per hari, semua hari — semakin kecil semakin baik)',
        'table_method' => 'Metode',
        'table_best' => 'Terbaik',
        'table_rows' => [
            ['Linear Trend', '100', '115', true],
            ['Seasonal SMA 4 minggu', '107', '129', false],
            ['Naive (hari sama minggu lalu)', '136', '165', false],
        ],
        'table_note' => 'Pada hari buka saja, Linear Trend membaik ke MAE 92 dan RMSE 108.',
        'reco_h' => 'Rekomendasi bisnis',
        'reco' => [
            'Buat paket bundling untuk pasangan produk yang sering dibeli bersamaan (misalnya satu seri dijual satu paket).',
            'Tampilkan produk pasangan berdekatan di halaman produk sebagai “sering dibeli bersama”.',
            'Jadwalkan restock mingguan berdasarkan prakiraan Linear Trend, supaya stok mengikuti permintaan dan tidak menumpuk karena firasat.',
        ],
        'tools_h' => 'Alat yang dipakai',
        'dash_h' => 'Dashboard',
        'dash_caption' => 'Forecast vs actual harian, top 10 association rules by lift, top produk, dan revenue per negara.',
        'zoom_hint' => 'Klik gambar untuk memperbesar',
        'load_embed' => 'Muat dashboard interaktif',
        'open_tableau' => 'Buka di Tableau Public',
        'open_image' => 'Buka gambar penuh',
        'embed_note' => 'Dashboard dimuat dari Tableau Public hanya saat Anda menekan tombol.',
    ],

    'experience' => [
        'eyebrow' => 'Pengalaman',
        'title_a' => 'Latar',
        'title_b' => 'Belakang Saya',
        'work_heading' => 'Pekerjaan',
        'work' => [
            'role' => 'Asisten Operasional & Keuangan',
            'org' => 'Usaha Properti Sewa Keluarga · Kos & Rumah Sewa',
            'period' => '2019 – Sekarang',
            'bullets' => [
                'Membantu manajemen penyewa, penagihan, pencatatan keuangan, dan operasional harian untuk 29 kamar.',
                'Menangani komunikasi dengan penyewa serta menyelesaikan masalah perawatan dan pembayaran.',
                'Usaha berkembang dari kos 20 kamar menjadi 29 kamar; saat ini sedang mencari lahan untuk kos baru.',
            ],
            'chart_title' => 'Pertumbuhan usaha',
            'chart_a' => 'Kos awal',
            'chart_a_value' => '20 kamar',
            'chart_b' => 'Tambahan kamar',
            'chart_b_value' => '9 kamar',
            'chart_default' => '29 kamar total — arahkan kursor ke bar',
        ],
        'org_heading' => 'Organisasi',
        'orgs' => [
            [
                'role' => 'Media Team',
                'org' => 'Porsinara BINUS',
                'period' => 'Jul 2025 – Okt 2025',
                'bullets' => ['Memproduksi dokumentasi video dan foto selama kegiatan acara.'],
            ],
            [
                'role' => 'OSIS — Divisi Media',
                'org' => 'Sekolah Kristen Kalam Kudus',
                'period' => '2022 – 2024',
                'bullets' => [
                    'Menangani seluruh editing untuk promosi dan kegiatan sekolah.',
                    'Mengelola pelaksanaan setiap kegiatan besar sekolah.',
                ],
            ],
        ],
        'edu_heading' => 'Pendidikan',
        'edu' => [
            [
                'role' => 'BINUS University — Bachelor of Computer Science',
                'period' => 'Sep 2024 – Sekarang',
                'bullets' => [
                    'IPK 3,18/4,00 (hingga semester 4).',
                    'Mata kuliah relevan: Big Data Analytics for Business, Software Development, Agile Software Development.',
                ],
            ],
            [
                'role' => 'Sekolah Kristen Kalam Kudus — SMA IPA',
                'period' => 'Jul 2021 – Mei 2024',
                'bullets' => ['Juara OSN Informatika tingkat Kabupaten/Kota, Papua (2022).'],
            ],
        ],
        'cert_heading' => 'Sertifikasi',
        'certs' => [
            'English for Market Research & Business Communication (C2.2)',
            'English for Professional Office (C1.2)',
        ],
    ],

    'skills' => [
        'eyebrow' => 'Skills',
        'title_a' => 'Apa yang Saya',
        'title_b' => 'Kuasai',
        'groups' => [
            ['Data & Analytics', 'fa-chart-column', ['Python', 'Jupyter', 'Power BI', 'Tableau', 'Data Preparation', 'Association Rule Mining', 'Time Series Forecasting', 'MySQL']],
            ['Web & Tools', 'fa-code', ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'React.js', 'Figma', 'GitHub', 'Mobile App Development']],
            ['Business & Analysis', 'fa-diagram-project', ['IT Business Analysis', 'Financial Analysis', 'UML', 'User Acceptance Testing (UAT)', 'UEQ', 'Software Testing', 'Bug Tracking']],
            ['Lainnya', 'fa-users', ['Teamwork', 'Public Speaking', 'Photography', 'Photo & Video Editing', 'English (C1–C2)', 'Bahasa Indonesia (Native)']],
        ],
    ],

    'contact' => [
        'eyebrow' => 'Kontak',
        'title_a' => 'Ayo',
        'title_b' => 'Terhubung!',
        'heading' => 'Hubungi Saya',
        'text' => 'Saya terbuka untuk peluang magang, freelance, atau sekadar ngobrol seputar teknologi dan bisnis. Jangan ragu menghubungi saya!',
    ],

    'footer' => '© :year — dibuat dengan hati yang bahagia ;)',
];
