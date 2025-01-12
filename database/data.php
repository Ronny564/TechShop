<?php
require_once "PDO.php";
$products = [
    // Gaming Mice
    [
        "id" => 1,
        "name" => "Razer DeathAdder V2",
        "stock" => 100,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Razer",
        "detail" => "Ergonomic design with optical sensor.",
        "specification"=> "Focus 20K DPI Optical Sensor: Auto-calibrates across mouse mat and reduces cursor drift from lift-off and landing for industry-leading precision. Razer Optical Switches – 70M Click Durability.
        3x Faster Than Traditional Mechanical Switches: New Razer optical mouse switches uses light beam-based actuation, registering button presses at the speed of light.
        Immersive, Customizable Chroma RGB Lighting: Supports 16.8 million colors w, included preset profiles; syncs with gameplay and Razer Chroma-enabled peripherals and Philips Hue products.
        8 Programmable Buttons: Allows for button remapping and assignment of complex macro functions through Razer Synapse 3.
        Drag-Free Cord for Wireless-Like Performance: Razer Speedflex cables eliminate the need for mouse bungees, drastically reducing weight and drag for absolute control.",
        "img_url" => "RazerDeathAdderV2.jpg"
    ],
    [
        "id" => 2,
        "name" => "Logitech G502 HERO",
        "stock" => 100,
        "price" => 49.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Logitech",
        "detail" => "Customizable weights and RGB lighting.",
        "specification"=> "Hero 25K sensor through a software update from G HUB, this upgrade is free to all players: Our most advanced, with 1:1 tracking, 400-plus ips, and 100 - 25,600 max dpi sensitivity plus zero smoothing, filtering, or acceleration.
        11 customizable buttons and onboard memory: Assign custom commands to the buttons and save up to five ready to play profiles directly to the mouse
        Adjustable weight system: Arrange up to five removable 3.6 grams weights inside the mouse for personalized weight and balance tuning.
        Programmable RGB Lighting and Lightsync technology: Customize lighting from nearly 16.8 million colors to match your team's colors, sport your own or sync colors with other Logitech G gear.
        Mechanical switch button tensioning: Metal spring tensioning system and pivot hinges are built into left and right gaming mouse buttons for a crisp, clean click feel with rapid click feedback.
        1 year hardware limited warranty. USB report rate: 1000Hz (1ms).
        Microprocessor: 32-bit ARM. Use Logitech G HUB to save your settings to the on board memory on the mouse and take them with you. Your saved settings will work on any PC without additional software or any login required.",
        "img_url" => "g502-hero-intro-nb.jpg"
    ],
    [
        "id" => 3,
        "name" => "SteelSeries Rival 600",
        "stock" => 100,
        "price" => 79.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "SteelSeries",
        "detail" => "Dual sensor system for high accuracy.",
        "specification"=>"High-performance optical sensor: The SteelSeries Rival 600 features a 12,000 CPI TrueMove3+ Dual Optical Sensor that provides true 1-to-1 tracking and exceptional precision, making it an ideal choice for gamers who demand the best in performance.
        Customizable weight system: The Rival 600 comes with a unique weight system that allows gamers to customize the mouse's weight and balance to their preferences. With eight 4-gram weights that can be added or removed, gamers can fine-tune the mouse's weight distribution for optimal performance.
        Personalized RGB lighting: The Rival 600's RGB lighting can be customized using the SteelSeries Engine 3 software, with over 16.8 million colors and a variety of lighting effects available. This allows gamers to create a unique look that matches their gaming setup or mood.
        Low lift-off distance: The Rival 600 boasts a 0.5mm lift-off distance, which helps prevent accidental cursor movements when lifting the mouse off the surface. This is particularly useful for gamers who use low-sensitivity settings and need to lift the mouse frequently to reposition it.
        Versatile and reliable: Whether you're playing fast-paced shooters, strategy games, or anything in between, the SteelSeries Rival 600 Gaming Mouse is a reliable and versatile choice that can help give you the competitive edge you need to win. Its precision tracking, weight customization, and personalized RGB lighting make it a top choice for serious gamers.",
        "img_url" => "05_rival600_kv.png"
    ],
    [
        "id" => 4,
        "name" => "Glorious Model O",
        "stock" => 100,
        "price" => 59.99,
        "color" => "White",
        "category" => "Gaming Mouse",
        "brand" => "Glorious",
        "detail" => "Ultra-lightweight mouse with honeycomb shell.",
        "specification"=>"Versatile Shape: Comfortable to use in palm, claw, or fingertip grip styles. Ideal for right-handed gamers with medium to large hands.
        Precise Speed: Our optical switches offer a 0.2ms response time and a 100M click lifecycle without any double clicks.
        Flawless Speed: Stay on target with our BAMF 2.0 26K sensor for 100-26,000 DPI resolution, 650 IPS speed, and 50G acceleration.
        Pro Level Polling: Capable of wireless 2K/4K polling and wired 8K polling for best-in-class mouse performance.
        Long Lasting Battery: Experience up to 80 hours of battery life in constant motion at 1,000 Hz polling, or up to 35 hours at 4,000 Hz polling. Play while charging over USB-C.",
        "img_url" => "Glorius.jpg"
    ],
    [
        "id" => 5,
        "name" => "HyperX Pulsefire FPS Pro",
        "stock" => 100,
        "price" => 39.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "HyperX",
        "detail" => "RGB lighting with precision optical sensor.",
        "specification"=>"It features a precision optical sensor for accuracy during gameplay.
        The RGB lighting is customizable to suit your gaming aesthetic.
        The ergonomic design ensures comfort for extended gaming hours.
        Lightweight construction allows for quick and smooth movements.",
        "img_url" => "Hyperx-pulsefire-raid-mouse.jpg"
    ],
    [
        "id" => 6,
        "name" => "Corsair Dark Core RGB Pro",
        "stock" => 100,
        "price" => 89.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Corsair",
        "detail" => "Wireless gaming mouse with dynamic lighting.",
        "specification"=>"Offers ultra-fast wireless connectivity for a seamless experience.
        The dynamic RGB lighting is fully customizable.
        Its contoured shape and textured grips enhance comfort.
        Ideal for long gaming sessions with a rechargeable battery.",
        "img_url" => "DARK_CORE_RGB_PRO_01.jpg"
    ],
    [
        "id" => 7,
        "name" => "Razer Basilisk V3",
        "stock" => 100,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Razer",
        "detail" => "Ergonomic design with customizable scroll wheel.",
        "specification"=>"Equipped with a customizable scroll wheel for advanced control.
        Features 11 programmable buttons for versatility.
        Designed ergonomically for prolonged use without strain.
        Customizable RGB lighting elevates your gaming setup.",
        "img_url" => "basilisk.png"
    ],
    [
        "id" => 8,
        "name" => "Logitech MX Master 3",
        "stock" => 100,
        "price" => 99.99,
        "color" => "Gray",
        "category" => "Gaming Mouse",
        "brand" => "Logitech",
        "detail" => "High precision and multi-device support.",
        "specification"=>"Built with ultra-precision tracking for smooth navigation.
        Features the MagSpeed electromagnetic scroll wheel for fast scrolling.
        Supports multiple devices, making it versatile for work and play.
        Designed for both productivity and comfort, ensuring efficiency.",
        "img_url" => "MX Master 3.jpg"
    ],

    // Gaming Keyboards
    [
        "id" => 9,
        "name" => "Razer BlackWidow V4",
        "stock" => 100,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Razer",
        "detail" => "Mechanical switches with RGB lighting.",
        "specification" => "The Razer BlackWidow V4 offers responsive mechanical switches for precise keypresses. Its customizable RGB lighting adds an immersive aesthetic. Ideal for gamers who value speed and comfort, it also features durable keycaps for long-lasting performance. The keyboard is designed to enhance your gaming experience with reliable performance during intense gaming sessions.",
        "img_url" => "https___medias-p1.phoenix..jpg"
    ],
    [
        "id" => 10,
        "name" => "Logitech G915 TKL",
        "stock" => 100,
        "price" => 199.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Logitech",
        "detail" => "Wireless keyboard with low-profile mechanical keys.",
        "specification" => "The Logitech G915 TKL is a wireless mechanical keyboard featuring low-profile keys for faster response times. It offers LIGHTSPEED wireless technology for seamless gaming. The slim design ensures portability without sacrificing performance. Its durable frame ensures longevity while providing an excellent typing experience for gaming and productivity.",
        "img_url" => "us-g915-tkl-carbon-gallery-topdown.jpg"
    ],
    [
        "id" => 11,
        "name" => "SteelSeries Apex Pro",
        "stock" => 100,
        "price" => 199.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "SteelSeries",
        "detail" => "Adjustable actuation mechanical switches.",
        "specification" => "The SteelSeries Apex Pro features adjustable actuation mechanical switches, allowing customization of key sensitivity. It includes RGB illumination with dynamic lighting effects for a personalized touch. The keyboard's aircraft-grade aluminum frame is durable yet lightweight. It provides an ergonomic typing experience for gamers who require precision and speed.",
        "img_url" => "apex_pro_img_buy_01.png__1920x1080_crop-fit_optimize_subsampling-2.png"
    ],

    [
        "id" => 12,
        "name" => "HyperX Alloy Origins",
        "stock" => 100,
        "price" => 89.99,
        "color" => "Red",
        "category" => "Gaming Keyboard",
        "brand" => "HyperX",
        "detail" => "Compact design with mechanical switches.",
        "specification" => "The HyperX Alloy Origins features responsive mechanical switches for faster typing and gaming actions. Its compact design saves space, perfect for gamers who prefer minimalism. The keyboard is built with a solid aluminum frame for durability. It also includes customizable RGB lighting, offering gamers a dynamic visual experience.",
        "img_url" => "hyperx_alloy_origins_us_1_top_down_976x.jpg"
    ],
    [
        "id" => 13,
        "name" => "Glorious GMMK Pro",
        "stock" => 100,
        "price" => 169.99,
        "color" => "White",
        "category" => "Gaming Keyboard",
        "brand" => "Glorious",
        "detail" => "Modular keyboard with customizable keys.",
        "specification" => "The Glorious GMMK Pro is a modular keyboard that allows users to easily swap switches without soldering. It features high-quality PBT keycaps for durability and a premium feel. The customizable keys offer a unique personalized gaming experience. Its solid aluminum case and RGB lighting make it an aesthetically pleasing choice for enthusiasts.",
        "img_url" => "Glorious GMMK PRO.jpg"
    ],
    [
        "id" => 14,
        "name" => "Corsair K95 RGB Platinum",
        "stock" => 100,
        "price" => 199.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Corsair",
        "detail" => "Premium mechanical keyboard with macro keys.",
        "specification" => "The Corsair K95 RGB Platinum features mechanical key switches for fast and accurate key presses. It includes six programmable macro keys to enhance gameplay. The keyboard's RGB backlighting provides vibrant colors for a customized look. Its aluminum frame ensures long-term durability, making it an ideal choice for serious gamers.",
        "img_url" => "K95_Platinum_FR_05.jpg"
    ],

    // Gaming Headphones
    [
        "id" => 15,
        "name" => "HyperX Cloud II",
        "stock" => 100,
        "price" => 99.99,
        "color" => "Gunmetal",
        "category" => "Gaming Headphone",
        "brand" => "HyperX",
        "detail" => "Virtual 7.1 surround sound.",
        "specification" => "The HyperX Cloud II features virtual 7.1 surround sound for an immersive gaming experience. Its memory foam ear cushions provide long-lasting comfort, even during extended gaming sessions. The headset is equipped with a noise-canceling microphone for clear communication. Built with durable materials, it is designed for both casual and competitive gamers.",
        "img_url" => "hyperx_cloud_ii_red_1_main_1280x.jpg"
    ],
    [
        "id" => 16,
        "name" => "SteelSeries Arctis Pro Wireless",
        "stock" => 100,
        "price" => 299.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "SteelSeries",
        "detail" => "Hi-res audio with lossless wireless.",
        "specification" => "The SteelSeries Arctis Pro Wireless delivers high-resolution audio with lossless wireless transmission. Its dual-wireless system provides both 2.4GHz and Bluetooth connectivity options. The headphones include a DTS Headphone:X v2.0 surround sound system for an immersive gaming experience. Designed for comfort, it features breathable ear cushions and a lightweight frame.",
        "img_url" => "arctis_pro_wl_black_livingroom_wide_4k_001.jpg__1850x800_q100_crop-scale_optimize_subsampling-2.jpg"
    ],
    [
        "id" => 17,
        "name" => "Logitech G Pro X",
        "stock" => 100,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Logitech",
        "detail" => "Blue VO!CE mic technology for clear voice.",
        "specification" => "The Logitech G Pro X features Blue VO!CE microphone technology for clear and professional-level voice chat. It offers a comfortable and lightweight design with memory foam ear pads. The headset provides 7.1 surround sound for a competitive edge in games. It is compatible with both PC and console gaming systems.",
        "img_url" => "PRO X.jpg"
    ],
    [
        "id" => 18,
        "name" => "Razer Kraken Ultimate",
        "stock" => 100,
        "price" => 119.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Razer",
        "detail" => "THX spatial audio for immersive gaming.",
        "specification" => "The Kraken Ultimate headset delivers THX Spatial Audio for an immersive gaming experience with 360-degree sound. It includes Razer Chroma RGB lighting, which is customizable for a unique look. The microphone has active noise cancellation for clearer communication. Its cooling gel-infused ear cushions provide comfort for extended gaming sessions.",
        "img_url" => "Razer-Kraken-Ultimate-1-1-1920x1079.jpg"
    ],

    // Gaming Chairs
    [
        "id" => 19,
        "name" => "SecretLab Titan Evo 2022",
        "stock" => 100,
        "price" => 449.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "SecretLab",
        "detail" => "Ergonomic chair with adjustable lumbar support.",
        "specification" => "The Titan Evo 2022 features adjustable lumbar support for personalized comfort. It has a high-density foam cushion for improved sitting posture. The chair is made with durable PU leather that resists wear and tear. It also includes a multi-tilt mechanism for better adjustability.",
        "img_url" => "2022-titan-evo-splash-main-min.jpg"
    ],
    [
        "id" => 20,
        "name" => "DXRacer Formula Series",
        "stock" => 100,
        "price" => 299.99,
        "color" => "Red",
        "category" => "Gaming Chair",
        "brand" => "DXRacer",
        "detail" => "Comfortable racing-style gaming chair.",
        "specification" => "The Formula Series chair features an ergonomic design with a high backrest for support. It has adjustable armrests and lumbar pillows for comfort. The chair is built with breathable mesh fabric for ventilation. Its durable frame ensures long-lasting performance during intense gaming sessions.",
        "img_url" => "DXRACER.jpg"
    ],
    [
        "id" => 21,
        "name" => "AKRacing Masters Series Pro",
        "stock" => 100,
        "price" => 499.99,
        "color" => "Black/Red",
        "category" => "Gaming Chair",
        "brand" => "AKRacing",
        "detail" => "High-quality, fully adjustable ergonomic chair.",
        "specification" => "The Masters Series Pro features a fully adjustable design for customized comfort. It comes with memory foam padding for added luxury and comfort. The chair is constructed from durable PU leather, ensuring easy maintenance. Its adjustable armrests and recline mechanisms provide optimal ergonomic support.",
        "img_url" => "PRO-blackLogo-2_689f0fd7-271d-4871-b590-ea511ffa6772_1800x1800.jpg"
    ],
    [
        "id" => 22,
        "name" => "Noblechairs Hero Series",
        "stock" => 100,
        "price" => 379.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Noblechairs",
        "detail" => "Premium materials with superior ergonomics.",
        "specification" => "The Hero Series chair is crafted from premium materials for durability and comfort. It features a high backrest with additional lumbar support for better posture. The chair's reclining function and adjustable armrests allow for a customized fit. The high-quality leatherette finish ensures a luxurious appearance and feel.",
        "img_url" => "66f75b3cb80cdecf0d67722bcc7a6fda.jpg"
    ],
    [
        "id" => 23,
        "name" => "Respawn 110 Racing Style Chair",
        "stock" => 100,
        "price" => 159.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Respawn",
        "detail" => "Integrated footrest for enhanced comfort.",
        "specification" => "The Respawn 110 features an integrated footrest for additional relaxation. It has a comfortable padded backrest and seat for extended gaming sessions. The chair's ergonomic design provides lumbar support, helping to reduce back strain. Its adjustable armrests and recline functions offer optimal customization for your comfort.",
        "img_url" => "RSP-110V2-BLK2BLACKFRONT_1920x.jpg"
    ],
    [
        "id" => 24,
        "name" => "EWin Flash XL Series",
        "stock" => 100,
        "price" => 349.99,
        "color" => "Blue",
        "category" => "Gaming Chair",
        "brand" => "EWin",
        "detail" => "Wide design with adjustable lumbar and headrest.",
        "specification" => "The EWin Flash XL Series offers an extra-wide design, ensuring maximum comfort for larger users. It features an adjustable lumbar support system to maintain proper posture. The included headrest is fully customizable for a better fit. The durable construction is designed to provide long-lasting support throughout gaming sessions.",
        "img_url" => "RSP-110V2-BLK2BLACKFRONT_1920x.jpg"
    ],
    [
        "id" => 25,
        "name" => "Corsair T3 Rush Gaming Chair",
        "stock" => 100,
        "price" => 249.99,
        "color" => "Gray/Black",
        "category" => "Gaming Chair",
        "brand" => "Corsair",
        "detail" => "Stylish ergonomic chair with soft fabric.",
        "specification" => "The Corsair T3 Rush features a soft, breathable fabric for all-day comfort. Its ergonomic design promotes proper posture to reduce strain on your back. The adjustable armrests allow for personalized comfort and support. A reclining feature offers additional relaxation during long gaming sessions.",
        "img_url" => "CorsairT3.jpg"
    ],
    [
        "id" => 25,
        "name" => "Logitech G Pro Wireless",
        "stock" => 100,
        "price" => 149.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Logitech",
        "detail" => "Wireless gaming mouse with HERO sensor.",
        "specification" => "The Logitech G Pro Wireless uses the HERO sensor for ultra-precise tracking. It offers a lightweight design ideal for fast-paced gaming. With customizable RGB lighting, you can personalize its appearance. Its wireless connectivity ensures minimal latency and reliable performance.",
        "img_url" => "LogitechGPRO.jpg"
    ],
    [
        "id" => 26,
        "name" => "Razer Naga X",
        "stock" => 100,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Razer",
        "detail" => "Lightweight MMO mouse with 16 programmable buttons.",
        "specification" => "The Razer Naga X is a lightweight MMO mouse that features 16 customizable buttons. Its ergonomic design provides comfort for extended gaming sessions. The mouse's precise 16,000 DPI sensor ensures accuracy during gameplay. The lightweight design reduces hand fatigue for long hours of use.",
        "img_url" => "RAZERnagaX.jpeg"
    ],
    [
        "id" => 27,
        "name" => "Corsair Ironclaw RGB",
        "stock" => 100,
        "price" => 59.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Corsair",
        "detail" => "Large ergonomic mouse with customizable buttons.",
        "specification" => "The Corsair Ironclaw RGB is designed for larger hands, offering a comfortable grip. It includes programmable buttons that provide flexibility for gaming macros. The mouse features customizable RGB lighting for personalized aesthetics. Its precise 18,000 DPI sensor ensures responsive and accurate tracking.",
        "img_url" => "IRONCLAW_RGB_01.jpg"
    ],
    [
        "id" => 28,
        "name" => "SteelSeries Sensei Ten",
        "stock" => 100,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "SteelSeries",
        "detail" => "TrueMove Pro sensor for 18,000 DPI precision.",
        "specification" => "The SteelSeries Sensei Ten boasts the TrueMove Pro sensor for unbeatable precision. It features an ambidextrous design, making it suitable for both left and right-handed users. The mouse includes 8 customizable buttons for various gaming commands. Its 18,000 DPI sensor ensures pinpoint accuracy and speed.",
        "img_url" => "buyimg_senseiten_001.jpg__1920x1080_q100_crop-fit_optimize_subsampling-2.jpg"
    ],
    [
        "id" => 29,
        "name" => "Glorious Model D",
        "stock" => 100,
        "price" => 59.99,
        "color" => "Black",
        "category" => "Gaming Mouse",
        "brand" => "Glorious",
        "detail" => "Ergonomic shape for comfort with ultra-lightweight design.",
        "specification" => "The Glorious Model D features an ergonomic shape for improved comfort during gameplay. Its ultra-lightweight design reduces hand fatigue for long gaming sessions. The 16,000 DPI sensor provides precise control and movement. The mouse's flexible cable offers minimal drag for smoother performance.",
        "img_url" => "71Ep-m9Q1qL.jpg"
    ],

    // Gaming Keyboards (continued)
    [
        "id" => 30,
        "name" => "Logitech G Pro X TKL",
        "stock" => 100,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Logitech",
        "detail" => "Customizable switches with hot-swappable keys.",
        "specification" => "The Logitech G Pro X TKL features customizable switches for a personalized typing experience. Its hot-swappable keys allow you to easily change key switches without soldering. The compact tenkeyless design saves space while maintaining full functionality. The keyboard's durable construction ensures long-lasting use.",
        "img_url" => "LD0006061306.jpg"
    ],
    [
        "id" => 31,
        "name" => "Razer Huntsman Mini",
        "stock" => 100,
        "price" => 119.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Razer",
        "detail" => "60% compact mechanical keyboard with opto-mechanical switches.",
        "specification" => "The Razer Huntsman Mini features a 60% compact layout for a minimalist setup. It includes opto-mechanical switches for faster actuation and durability. The keyboard is equipped with Razer Chroma RGB lighting for customizable effects. Its durable build ensures long-lasting reliability for serious gamers.",
        "img_url" => "64305e46e0e689115d110ae7-razer-huntsman-mini-60-gaming-keyboard.jpg"
    ],
    [
        "id" => 32,
        "name" => "Corsair K60 RGB Pro",
        "stock" => 100,
        "price" => 79.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Corsair",
        "detail" => "Linear mechanical switches with RGB lighting.",
        "specification" => "The Corsair K60 RGB Pro features linear mechanical switches for smooth key presses. Its customizable RGB lighting enhances the gaming experience with vibrant colors. The durable aluminum frame provides strength and stability. The keyboard's anti-ghosting technology ensures accurate keystrokes during intense gaming sessions.",
        "img_url" => "k60_rgb_pro_lp_front.jpg"
    ],
    [
        "id" => 33,
        "name" => "SteelSeries Apex 7",
        "stock" => 100,
        "price" => 149.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "SteelSeries",
        "detail" => "OmniPoint adjustable mechanical switches.",
        "specification" => "The SteelSeries Apex 7 features OmniPoint adjustable mechanical switches for a personalized typing experience. Its RGB illumination provides customizable lighting effects to match your setup. The keyboard includes a premium magnetic wrist rest for added comfort. The solid steel frame ensures long-lasting durability and stability.",
        "img_url" => "buyimg_apex7_001-v2.jpg__1920x1080_q100_crop-fit_optimize_subsampling-2.jpg"
    ],
    [
        "id" => 34,
        "name" => "Razer Cynosa V2",
        "stock" => 100,
        "price" => 69.99,
        "color" => "Black",
        "category" => "Gaming Keyboard",
        "brand" => "Razer",
        "detail" => "Full-size membrane keyboard with RGB lighting.",
        "specification" => "The Razer Cynosa V2 is a full-size membrane keyboard with quiet, responsive keys. Its RGB Chroma backlighting offers customizable effects to match your style. The dedicated media controls allow for easy adjustment of music and video settings. The keyboard’s spill-resistant design provides added durability.",
        "img_url" => "61LHoHUBuPL.jpg"
    ],

    // Gaming Headphones
    [
        "id" => 35,
        "name" => "Corsair HS70 Pro",
        "stock" => 100,
        "price" => 99.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Corsair",
        "detail" => "Wireless gaming headset with 7.1 surround sound.",
        "specification" => "The Corsair HS70 Pro features 7.1 surround sound for immersive gaming audio. It has long-lasting wireless connectivity with a 40-foot range. The memory foam ear cups provide comfort for extended gaming sessions. Its durable, lightweight design ensures long-term use without discomfort.",
        "img_url" => "61LSZY5nk4L._AC_UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 36,
        "name" => "Logitech G733 LIGHTSPEED",
        "stock" => 100,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Logitech",
        "detail" => "Wireless RGB gaming headset with suspension headband.",
        "specification" => "The Logitech G733 LIGHTSPEED offers wireless freedom with LIGHTSPEED technology for lag-free performance. It features custom RGB lighting that can be fully personalized. The suspension headband provides a comfortable, weightless fit. Its 16-hour battery life supports extended gaming sessions without interruption.",
        "img_url" => "71xNjrzG69L.jpg"
    ],
    [
        "id" => 37,
        "name" => "SteelSeries Arctis 7P",
        "stock" => 100,
        "price" => 149.99,
        "color" => "White",
        "category" => "Gaming Headphone",
        "brand" => "SteelSeries",
        "detail" => "Wireless gaming headphones with 24-hour battery life.",
        "specification" => "The SteelSeries Arctis 7P provides 24-hour battery life for non-stop gaming. Its ClearCast microphone ensures crystal-clear communication. The 40mm drivers deliver immersive sound for a superior audio experience. The breathable ear cushions keep your ears cool and dry during long gaming sessions.",
        "img_url" => "a7p_white_buyimg_02.png__1920x1080_crop-fit_optimize_subsampling-2.png"
    ],
    [
        "id" => 38,
        "name" => "Razer Kraken V3",
        "stock" => 100,
        "price" => 129.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "Razer",
        "detail" => "THX Spatial Audio with RGB Chroma lighting.",
        "specification" => "The Razer Kraken V3 offers immersive THX Spatial Audio for a truly 3D sound experience. Its cooling gel-infused ear cushions reduce heat build-up during intense sessions. The RGB Chroma lighting is fully customizable to match your setup. The durable aluminum frame ensures long-lasting reliability.",
        "img_url" => "razer-kraken-v3-x_hero-mobile-768x460.jpg"
    ],
    [
        "id" => 39,
        "name" => "HyperX Cloud Stinger 2",
        "stock" => 100,
        "price" => 49.99,
        "color" => "Black",
        "category" => "Gaming Headphone",
        "brand" => "HyperX",
        "detail" => "Lightweight gaming headset with 50mm drivers.",
        "specification" => "The HyperX Cloud Stinger 2 features 50mm drivers for rich, high-quality sound. Its lightweight design provides comfort without pressure, even during long gaming sessions. The adjustable steel sliders ensure a perfect fit. The noise-canceling microphone helps to eliminate background distractions.",
        "img_url" => "hyperx_cloud_stinger_2_1_main_1052x.jpg"
    ],

    // Gaming Chairs
    [
        "id" => 40,
        "name" => "SecretLab Omega 2020 Series",
        "stock" => 100,
        "price" => 389.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "SecretLab",
        "detail" => "Premium chair with lumbar support and cold-cure foam.",
        "specification" => "The SecretLab Omega 2020 Series features premium cold-cure foam for enhanced comfort. Its lumbar support and multi-tilt mechanism provide personalized seating. The 4D adjustable armrests allow for optimal arm positioning. The durable PU leather surface resists wear and tear, ensuring long-term use.",
        "img_url" => "gallery_2020_OM-03-min.jpg"
    ],
    [
        "id" => 41,
        "name" => "DXRacer King Series",
        "stock" => 100,
        "price" => 399.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "DXRacer",
        "detail" => "Adjustable armrests and ergonomic support.",
        "specification" => "The DXRacer King Series offers adjustable armrests for personalized comfort. Its ergonomic backrest and headrest ensure proper posture during extended gaming sessions. The high-density foam provides additional support. Its sturdy steel frame and durable upholstery are built for long-lasting use.",
        "img_url" => "fauteuil-gamer-dxracer-king-v4-en-similicuir.webp"
    ],
    [
        "id" => 42,
        "name" => "AKRacing Core Series EX",
        "stock" => 100,
        "price" => 249.99,
        "color" => "Black/White",
        "category" => "Gaming Chair",
        "brand" => "AKRacing",
        "detail" => "PU leather seat with ergonomic headrest.",
        "specification" => "The AKRacing Core Series EX features a PU leather seat that is both durable and easy to clean. Its ergonomic headrest and lumbar cushion provide support for the back and neck. The chair’s 4D adjustable armrests allow for comfort customization. The sturdy metal frame ensures long-term durability.",
        "img_url" => "EX-blackred-8_b3de4e6f-6bbd-455f-912c-5ada072b1453_1080x.jpg"
    ],
    [
        "id" => 43,
        "name" => "Noblechairs EPIC Series",
        "stock" => 100,
        "price" => 399.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Noblechairs",
        "detail" => "Premium gaming chair with leatherette finish.",
        "specification" => "The Noblechairs EPIC Series features a premium leatherette finish, providing a luxurious feel and long-lasting durability. The chair is designed for optimal comfort with a high backrest, lumbar support, and a reclining mechanism that supports your posture during long gaming sessions.",
        "img_url" => "ec5f4d1588d881c5b4bc55aa23c32bb7.jpg"
    ],
    [
        "id" => 44,
        "name" => "Respawn 200 Racing Style Chair",
        "stock" => 100,
        "price" => 179.99,
        "color" => "Black",
        "category" => "Gaming Chair",
        "brand" => "Respawn",
        "detail" => "Features adjustable recline and tilt tension.",
        "specification" => "The Respawn 200 Racing Style Chair offers adjustable recline, allowing you to find the perfect angle for relaxation or gaming. Its tilt tension mechanism ensures that you can adjust the resistance to suit your comfort level. The ergonomic design provides optimal support for long gaming sessions.",
        "img_url" => "71tPPSZovRL.jpg"
    ],
    [
        "id" => 45,
        "name" => "EWin Champion Series",
        "stock" => 100,
        "price" => 369.99,
        "color" => "White/Black",
        "category" => "Gaming Chair",
        "brand" => "EWin",
        "detail" => "Wide seat and backrest with memory foam.",
        "specification" => "The EWin Champion Series chair features a wide seat and backrest that provide excellent comfort and support. The memory foam padding contours to your body, ensuring a custom fit. It also has adjustable armrests and recline features, making it suitable for long hours of gaming or working.",
        "img_url" => "CPA-BW3A-1.jpg"
    ],
    [
        "id" => 46,
        "name" => "Corsair T2 Road Warrior",
        "stock" => 100,
        "price" => 219.99,
        "color" => "Gray",
        "category" => "Gaming Chair",
        "brand" => "Corsair",
        "detail" => "Stylish design with 4D adjustable armrests.",
        "specification" => "The Corsair T2 Road Warrior chair combines style and comfort with its sleek, modern design. It features 4D adjustable armrests to allow for customizable support, as well as high-density foam padding for comfort. The durable steel frame ensures that the chair remains sturdy throughout your gaming or work sessions.",
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


