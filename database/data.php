<?php
require_once "PDO.php";
$products = [
    // Gaming Mice
    [
        "id" => 1,
        "name" => "Razer DeathAdder V2",
        "stock" => 50,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Razer",
        "detail" => "Ergonomic design with optical sensor.",
        "img_url" => "RazerDeathAdderV2.jpg"
    ],
    [
        "id" => 2,
        "name" => "Logitech G502 HERO",
        "stock" => 30,
        "price" => 49.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Logitech",
        "detail" => "Customizable weights and RGB lighting.",
        "img_url" => "g502-hero-intro-nb.jpg"
    ],
    [
        "id" => 3,
        "name" => "SteelSeries Rival 600",
        "stock" => 20,
        "price" => 79.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "SteelSeries",
        "detail" => "Dual sensor system for high accuracy.",
        "img_url" => "05_rival600_kv.png"
    ],
    [
        "id" => 4,
        "name" => "Glorious Model O",
        "stock" => 35,
        "price" => 59.99,
        "color" => "White",
        "category" => "Gaming Mouse",
        "brand" => "Glorious",
        "detail" => "Ultra-lightweight mouse with honeycomb shell.",
        "img_url" => "Glorius.jpg"
    ],
    [
        "id" => 5,
        "name" => "HyperX Pulsefire FPS Pro",
        "stock" => 25,
        "price" => 39.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "HyperX",
        "detail" => "RGB lighting with precision optical sensor.",
        "img_url" => "Hyperx-pulsefire-raid-mouse.jpg"
    ],
    [
        "id" => 6,
        "name" => "Corsair Dark Core RGB Pro",
        "stock" => 18,
        "price" => 89.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Corsair",
        "detail" => "Wireless gaming mouse with dynamic lighting.",
        "img_url" => "DARK_CORE_RGB_PRO_01.jpg"
    ],
    [
        "id" => 7,
        "name" => "Razer Basilisk V3",
        "stock" => 28,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Razer",
        "detail" => "Ergonomic design with customizable scroll wheel.",
        "img_url" => "basilisk.png"
    ],
    [
        "id" => 8,
        "name" => "Logitech MX Master 3",
        "stock" => 15,
        "price" => 99.99,
        "color" => "Gray",
        "category" => "Gaming Mouse",
        "brand" => "Logitech",
        "detail" => "High precision and multi-device support.",
        "img_url" => "MX Master 3.jpg"
    ],

    // Gaming Keyboards
    [
        "id" => 9,
        "name" => "Razer BlackWidow V4",
        "stock" => 40,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Razer",
        "detail" => "Mechanical switches with RGB lighting.",
        "img_url" => "https___medias-p1.phoenix..jpg"
    ],
    [
        "id" => 10,
        "name" => "Logitech G915 TKL",
        "stock" => 15,
        "price" => 199.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Logitech",
        "detail" => "Wireless keyboard with low-profile mechanical keys.",
        "img_url" => "us-g915-tkl-carbon-gallery-topdown.jpg"
    ],
    [
        "id" => 11,
        "name" => "SteelSeries Apex Pro",
        "stock" => 20,
        "price" => 199.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "SteelSeries",
        "detail" => "Adjustable actuation mechanical switches.",
        "img_url" => "apex_pro_img_buy_01.png__1920x1080_crop-fit_optimize_subsampling-2.png"
    ],
    [
        "id" => 12,
        "name" => "HyperX Alloy Origins",
        "stock" => 25,
        "price" => 89.99,
        "color" => "Red",
        "category" => "Gaming Keyboard",
        "brand" => "HyperX",
        "detail" => "Compact design with mechanical switches.",
        "img_url" => "hyperx_alloy_origins_us_1_top_down_976x.jpg"
    ],
    [
        "id" => 13,
        "name" => "Glorious GMMK Pro",
        "stock" => 10,
        "price" => 169.99,
        "color" => "White",
        "category" => "Gaming Keyboard",
        "brand" => "Glorious",
        "detail" => "Modular keyboard with customizable keys.",
        "img_url" => "Glorious GMMK PRO.jpg"
    ],
    [
        "id" => 14,
        "name" => "Corsair K95 RGB Platinum",
        "stock" => 12,
        "price" => 199.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Corsair",
        "detail" => "Premium mechanical keyboard with macro keys.",
        "img_url" => "K95_Platinum_FR_05.jpg"
    ],

    // Gaming Headphones
    [
        "id" => 15,
        "name" => "HyperX Cloud II",
        "stock" => 20,
        "price" => 99.99,
        "color" => "Gunmetal",
        "category" => "Gaming Headphone",
        "brand" => "HyperX",
        "detail" => "Virtual 7.1 surround sound.",
        "img_url" => "hyperx_cloud_ii_red_1_main_1280x.jpg"
    ],
    [
        "id" => 16,
        "name" => "SteelSeries Arctis Pro Wireless",
        "stock" => 10,
        "price" => 299.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "SteelSeries",
        "detail" => "Hi-res audio with lossless wireless.",
        "img_url" => "arctis_pro_wl_black_livingroom_wide_4k_001.jpg__1850x800_q100_crop-scale_optimize_subsampling-2.jpg"
    ],
    [
        "id" => 17,
        "name" => "Logitech G Pro X",
        "stock" => 15,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Logitech",
        "detail" => "Blue VO!CE mic technology for clear voice.",
        "img_url" => "PRO X.jpg"
    ],
    [
        "id" => 18,
        "name" => "Razer Kraken Ultimate",
        "stock" => 25,
        "price" => 119.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Razer",
        "detail" => "THX spatial audio for immersive gaming.",
        "img_url" => "Razer-Kraken-Ultimate-1-1-1920x1079.jpg"
    ],

    // Gaming Chairs
    [
        "id" => 19,
        "name" => "SecretLab Titan Evo 2022",
        "stock" => 8,
        "price" => 449.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "SecretLab",
        "detail" => "Ergonomic chair with adjustable lumbar support.",
        "img_url" => "2022-titan-evo-splash-main-min.jpg"
    ],
    [
        "id" => 20,
        "name" => "DXRacer Formula Series",
        "stock" => 12,
        "price" => 299.99,
        "color" => "Red",
        "category" => "Gaming Chair",
        "brand" => "DXRacer",
        "detail" => "Comfortable racing-style gaming chair.",
        "img_url" => "DXRACER.jpg"
    ],
    [
        "id" => 21,
        "name" => "AKRacing Masters Series Pro",
        "stock" => 10,
        "price" => 499.99,
        "color" => "Black/Red",
        "category" => "Gaming Chair",
        "brand" => "AKRacing",
        "detail" => "High-quality, fully adjustable ergonomic chair.",
        "img_url" => "PRO-blackLogo-2_689f0fd7-271d-4871-b590-ea511ffa6772_1800x1800.jpg"
    ],
    [
        "id" => 22,
        "name" => "Noblechairs Hero Series",
        "stock" => 12,
        "price" => 379.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Noblechairs",
        "detail" => "Premium materials with superior ergonomics.",
        "img_url" => "66f75b3cb80cdecf0d67722bcc7a6fda.jpg"
    ],
    [
        "id" => 23,
        "name" => "Respawn 110 Racing Style Chair",
        "stock" => 15,
        "price" => 159.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Respawn",
        "detail" => "Integrated footrest for enhanced comfort.",
        "img_url" => "RSP-110V2-BLK2BLACKFRONT_1920x.jpg"
    ],
    [
        "id" => 24,
        "name" => "EWin Flash XL Series",
        "stock" => 10,
        "price" => 349.99,
        "color" => "Blue",
        "category" => "Gaming Chair",
        "brand" => "EWin",
        "detail" => "Wide design with adjustable lumbar and headrest.",
        "img_url" => "RSP-110V2-BLK2BLACKFRONT_1920x.jpg"
    ],


    [
        "id" => 25,
        "name" => "Corsair T3 Rush Gaming Chair",
        "stock" => 8,
        "price" => 249.99,
        "color" => "Gray/Black",
        "category" => "Gaming Chair",
        "brand" => "Corsair",
        "detail" => "Stylish ergonomic chair with soft fabric.",
        "img_url" => "CorsairT3.jpg"
    ],
    [
        "id" => 25,
        "name" => "Logitech G Pro Wireless",
        "stock" => 30,
        "price" => 149.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Logitech",
        "detail" => "Wireless gaming mouse with HERO sensor.",
        "img_url" => "LogitechGPRO.jpg"
    ],
    [
        "id" => 26,
        "name" => "Razer Naga X",
        "stock" => 18,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Razer",
        "detail" => "Lightweight MMO mouse with 16 programmable buttons.",
        "img_url" => "RAZERnagaX.jpeg"
    ],
    [
        "id" => 27,
        "name" => "Corsair Ironclaw RGB",
        "stock" => 22,
        "price" => 59.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Corsair",
        "detail" => "Large ergonomic mouse with customizable buttons.",
        "img_url" => "IRONCLAW_RGB_01.jpg"
    ],
    [
        "id" => 28,
        "name" => "SteelSeries Sensei Ten",
        "stock" => 12,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "SteelSeries",
        "detail" => "TrueMove Pro sensor for 18,000 DPI precision.",
        "img_url" => "buyimg_senseiten_001.jpg__1920x1080_q100_crop-fit_optimize_subsampling-2.jpg"
    ],
    [
        "id" => 29,
        "name" => "Glorious Model D",
        "stock" => 28,
        "price" => 59.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Glorious",
        "detail" => "Ergonomic shape for comfort with ultra-lightweight design.",
        "img_url" => "71Ep-m9Q1qL.jpg"
    ],

    // Gaming Keyboards (continued)
    [
        "id" => 30,
        "name" => "Logitech G Pro X TKL",
        "stock" => 16,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Logitech",
        "detail" => "Customizable switches with hot-swappable keys.",
        "img_url" => "LD0006061306.jpg"
    ],
    [
        "id" => 31,
        "name" => "Razer Huntsman Mini",
        "stock" => 14,
        "price" => 119.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Razer",
        "detail" => "60% compact mechanical keyboard with opto-mechanical switches.",
        "img_url" => "64305e46e0e689115d110ae7-razer-huntsman-mini-60-gaming-keyboard.jpg"
    ],
    [
        "id" => 32,
        "name" => "Corsair K60 RGB Pro",
        "stock" => 18,
        "price" => 79.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Corsair",
        "detail" => "Linear mechanical switches with RGB lighting.",
        "img_url" => "k60_rgb_pro_lp_front.jpg"
    ],
    [
        "id" => 33,
        "name" => "SteelSeries Apex 7",
        "stock" => 21,
        "price" => 149.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "SteelSeries",
        "detail" => "OmniPoint adjustable mechanical switches.",
        "img_url" => "buyimg_apex7_001-v2.jpg__1920x1080_q100_crop-fit_optimize_subsampling-2.jpg"
    ],
    [
        "id" => 34,
        "name" => "Razer Cynosa V2",
        "stock" => 30,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Razer",
        "detail" => "Full-size membrane keyboard with RGB lighting.",
        "img_url" => "61LHoHUBuPL.jpg"
    ],

    // Gaming Headphones
    [
        "id" => 35,
        "name" => "Corsair HS70 Pro",
        "stock" => 15,
        "price" => 99.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Corsair",
        "detail" => "Wireless gaming headset with 7.1 surround sound.",
        "img_url" => "61LSZY5nk4L._AC_UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 36,
        "name" => "Logitech G733 LIGHTSPEED",
        "stock" => 18,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Logitech",
        "detail" => "Wireless RGB gaming headset with suspension headband.",
        "img_url" => "71xNjrzG69L.jpg"
    ],
    [
        "id" => 37,
        "name" => "SteelSeries Arctis 7P",
        "stock" => 14,
        "price" => 149.99,
        "color" => "White",
        "category" => "Gaming Headphone",
        "brand" => "SteelSeries",
        "detail" => "Wireless gaming headphones with 24-hour battery life.",
        "img_url" => "a7p_white_buyimg_02.png__1920x1080_crop-fit_optimize_subsampling-2.png"
    ],
    [
        "id" => 38,
        "name" => "Razer Kraken V3",
        "stock" => 20,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Razer",
        "detail" => "THX Spatial Audio with RGB Chroma lighting.",
        "img_url" => "razer-kraken-v3-x_hero-mobile-768x460.jpg"
    ],
    [
        "id" => 39,
        "name" => "HyperX Cloud Stinger 2",
        "stock" => 25,
        "price" => 49.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "HyperX",
        "detail" => "Lightweight gaming headset with 50mm drivers.",
        "img_url" => "hyperx_cloud_stinger_2_1_main_1052x.jpg"
    ],

    // Gaming Chairs
    [
        "id" => 40,
        "name" => "SecretLab Omega 2020 Series",
        "stock" => 10,
        "price" => 389.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "SecretLab",
        "detail" => "Premium chair with lumbar support and cold-cure foam.",
        "img_url" => "gallery_2020_OM-03-min.jpg"
    ],
    [
        "id" => 41,
        "name" => "DXRacer King Series",
        "stock" => 8,
        "price" => 399.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "DXRacer",
        "detail" => "Adjustable armrests and ergonomic support.",
        "img_url" => "fauteuil-gamer-dxracer-king-v4-en-similicuir.webp"
    ],
    [
        "id" => 42,
        "name" => "AKRacing Core Series EX",
        "stock" => 12,
        "price" => 249.99,
        "color" => "Black/White",
        "category" => "Gaming Chair",
        "brand" => "AKRacing",
        "detail" => "PU leather seat with ergonomic headrest.",
        "img_url" => "EX-blackred-8_b3de4e6f-6bbd-455f-912c-5ada072b1453_1080x.jpg"
    ],
    [
        "id" => 43,
        "name" => "Noblechairs EPIC Series",
        "stock" => 15,
        "price" => 399.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Noblechairs",
        "detail" => "Premium gaming chair with leatherette finish.",
        "img_url" => "ec5f4d1588d881c5b4bc55aa23c32bb7.jpg"
    ],
    [
        "id" => 44,
        "name" => "Respawn 200 Racing Style Chair",
        "stock" => 18,
        "price" => 179.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Respawn",
        "detail" => "Features adjustable recline and tilt tension.",
        "img_url" => "71tPPSZovRL.jpg"
    ],
    [
        "id" => 45,
        "name" => "EWin Champion Series",
        "stock" => 8,
        "price" => 369.99,
        "color" => "White/Black",
        "category" => "Gaming Chair",
        "brand" => "EWin",
        "detail" => "Wide seat and backrest with memory foam.",
        "img_url" => "CPA-BW3A-1.jpg"
    ],
    [
        "id" => 46,
        "name" => "Corsair T2 Road Warrior",
        "stock" => 12,
        "price" => 219.99,
        "color" => "Gray",
        "category" => "Gaming Chair",
        "brand" => "Corsair",
        "detail" => "Stylish design with 4D adjustable armrests.",
        "img_url" => "Gallery-2.jpg"
    ]
];


$admins=[
    [
        "id"=>1,
        "name"=>"Lin",
        "email"=>"lin@gmail.com",
        "address"=>'Yangon',
        "password"=>'123',
    ],
    [
        "id"=>2,
        "name"=>"Myat",
        "email"=>'myat@gmail.com',
        "address"=>'Yangon',     
        "password"=>'456',
    ],
    [
        "id"=>3,
        "name"=>"Thu",
        "email"=>'thu@gmail.com',
        "address"=>'Yangon',     
        "password"=>'789',
    ]
];
$customers=[
    [
        "id"=>10,
        "name"=>"Ingyin",
        "email"=>"lin@gmail.com",
        "address"=>"Yangon",
        "password"=>'123',
    ],
    [
        "id"=>20,
        "name"=>"Thwe",
        "email"=>'myat@gmail.com',
        "address"=>"Yangon",     
        "password"=>'456',
    ],
    [
        "id"=>30,
        "name"=>"Wai",
        "email"=>'thu@gmail.com',
        "address"=>"Yangon",     
        "password"=>'789',
    ]
];


