<?php

$vAttributes = include(base_path() . '/Modules/Isite/Config/standardValuesForBlocksAttributes.php');

return [
  "search" => [
    "title" => "Buscador",
    "systemName" => "isearch::search",
    "nameSpace" => "livewire",
    "contentFields" => [
        "title" => [
            "name" => "title",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Titulo del Buscador"
            ]
        ],
        "placeholder" => [
            "name" => "placeholder",
            "type" => "input",
            "columns" => "col-12",
            "isTranslatable" => true,
            "props" => [
                "label" => "Placeholder del Buscador"
            ]
        ],
    ],
    "attributes" => [
      "general" => [
        "title" => "General",
        "fields" => [
          "layout" => [
            "name" => "layout",
            "value" =>  "search-layout-1",
            "type" => "select",
            "props" => [
              "label" => "Layout",
              "options" => [
                  ["label" => "Layout 1", "value" => "search-layout-1"],
                  ["label" => "Layout 2", "value" => "search-layout-2"],
                  ["label" => "Layout 3", "value" => "search-layout-3"],
                  ["label" => "Layout 4", "value" => "search-layout-4"],
                  ["label" => "Layout 5", "value" => "search-layout-5"]
              ]
            ]
          ],
          "icon" => [
            "name" => "icon",
            "value" => "fa fa-search",
            "type" => "input",
            "props" => [
                "label" => "Icono",
            ]
          ],
          "classButton" => [
            "name" => "classButton",
            "columns" => "col-12",
            "type" => "input",
            "props" => [
                "label" => "Class Button",
            ]
          ],
          "styleButton" => [
            "name" => "styleButton",
            "type" => "input",
            "columns" => "col-12",
            "props" => [
                "label" => "Estilos button",
                'type' => 'textarea',
                'rows' => 5,
            ],
          ],
        ]
      ]
    ]
  ],
];
