<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                    [
                        "text" => "Kmom03",
                        "url" => "redovisning/kmom03",
                        "title" => "Redovisning för kmom03.",
                    ],
                    [
                        "text" => "Kmom04",
                        "url" => "redovisning/kmom04",
                        "title" => "Redovisning för kmom04.",
                    ],
                    [
                        "text" => "Kmom05",
                        "url" => "redovisning/kmom05",
                        "title" => "Redovisning för kmom05.",
                    ],
                    [
                        "text" => "Kmom06",
                        "url" => "redovisning/kmom06",
                        "title" => "Redovisning för kmom06.",
                    ],
                    [
                        "text" => "Kmom10",
                        "url" => "redovisning/kmom10",
                        "title" => "Redovisning för kmom10.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Docs",
            "url" => "dokumentation",
            "title" => "Dokumentation av ramverk och liknande.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "dokumentation/kmom01",
                        "title" => "Dokumentation för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "dokumentation/kmom02",
                        "title" => "Dokumentation för kmom02.",
                    ],
                    [
                        "text" => "Kmom03",
                        "url" => "dokumentation/kmom03",
                        "title" => "Dokumentation för kmom03.",
                    ],
                    [
                        "text" => "Kmom04",
                        "url" => "dokumentation/kmom04",
                        "title" => "Dokumentation för kmom04.",
                    ],
                    [
                        "text" => "Kmom05",
                        "url" => "dokumentation/kmom05",
                        "title" => "Dokumentation för kmom05.",
                    ],
                    [
                        "text" => "Kmom06",
                        "url" => "dokumentation/kmom06",
                        "title" => "Dokumentation för kmom06.",
                    ],
                    [
                        "text" => "Kmom10",
                        "url" => "dokumentation/kmom10",
                        "title" => "Dokumentation för kmom10.",
                    ],
                ]
            ]
        ],
        [
            "text" => "Test &amp; Lek",
            "url" => "lek",
            "title" => "Testa och lek med test- och exempelprogram",
        ],
        [
            "text" => "Anax dev",
            "url" => "dev",
            "title" => "Anax development utilities",
        ],
    ],
];
