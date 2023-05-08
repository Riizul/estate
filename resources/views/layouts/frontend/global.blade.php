@php
$global = collect([
    "id" => 1,
    'realtor_address' => "Cebu City",
    "email" => "jayann.propertysearchph@gmail.com",
    "telephone_number" => "000-000-0000",
    "copyright" => "© Property Search - All rights reserved",
    "facebook"=> "https://www.facebook.com/jayannvalduezabonjoc",
    "youtube" => "#",
    "instagram" => "https://www.instagram.com/jayannhvaldueza",
    "twitter" => "#",
    'mobile_phone' => [
         ['id' => '1', 'number' => 'Globe: 09178892508'],
         ['id' => '2', 'number' => 'Whatsapp: 09178892508'],
         ['id' => '3', 'number' => 'Viber: 09178892508'],
         ['id' => '4', 'number' => 'Telegram: 09178892508'],
     ],
]);

$home = collect([
    "id" => 2,
    "banner_cta_text" => " Finding your perfect address",
    "banner_cta_sub_text" => "We are here to provide you a stress-free home buying experience without the pressure. At Your Service.",
    "published_at" => "2022-06-16T14:51:52.172Z",
    "home_section_1" => [
            "id" => 1,
            "about" => "about me",
            "title" => "Working with Jay Ann",
            "content" => "My name is Jay Ann and I am a highly trained real estate professional with years of experience. I am a member of the National Association of Realtors and a PRC Accredited Real Estate Salesperson. I work hard to ensure that you are getting the best deal possible on your new home or investment property.",
            "realtor_name" => "Jay Ann Hortezano Valdueza",
            "realtor_position" => "Cebu Realtor",
            "realtor_image" => [
                "id" => 1,
                "name" => "realtor.webp",
                "alternativeText" => ""
            ]
        ],
    "home_section_2" => [
        "id" => 1,
        "about" => "featured properties",
        "title" => "Finest selection of our properties"
    ],
    "home_section_3" => [
        "id" => 1,
        "about" => "services",
        "title" => "Jay Ann help clients sell, buy or rent properties hassle free",
        "content" => "Utilizing his exceptional experience and knowledge of the luxury waterfront markets, Roland serves an extensive and elite worldwide client base. He enjoys a reputation as a tenacious Broker.",
        "list_1" => "24/7 Support available",
        "list_2" => "Expert legal support from us",
        "list_3" => "Free submission on our website",
        "list_4" => "Home loans assistance from our staff",
        "background_image" => [
            "id" => 3,
            "name" => "home.webp",
            "alternativeText" => ""
        ]
    ],
    "home_section_4" => [
        "id" => 1,
        "about" => "videos",
        "title" => "Property Videos"
    ],
    "Seo" => [
        "metaTitle" => "Your source for all your real estate needs",
        "metaDescription" => "Property Search PH help clients sell, buy or rent properties hassle free",
        "shareImage" => "./img/logo.svg"
    ]
]);
@endphp
