<?php

return [
  'name' => 'Isearch',

  'queries' => [
    'iblog' => true,
    'icommerce' => true,
    'page' => false,
    'iplaces' => false,
    'itourism' => false,
    'iperformer' => false
  ],
  'route' => 'isearch.search',

  /*Layout Posts - Index */
  'layoutIndex' => [
    'default' => 'four',
    'options' => [
      'four' => [
        'name' => 'four',
        'class' => 'col-6 col-md-4 col-lg-3',
        'icon' => 'fa fa-th-large',
        'status' => true
      ],
      'three' => [
        'name' => 'three',
        'class' => 'col-6 col-md-4 col-lg-4',
        'icon' => 'fa fa-square-o',
        'status' => true
      ],
      'one' => [
        'name' => 'one',
        'class' => 'col-12',
        'icon' => 'fa fa-align-justify',
        'status' => true
      ],
    ]
  ],

  "indexItemListAttributes" => [
      'layout'=>'item-list-layout-6',
      'withCreatedDate' => false,
      'withViewMoreButton' => true,
      'withSummary' => false,
      'buttonSize'=>'button-small',
      'buttonLayout'=>'rounded',
      'buttonTextSize'=>14,
      'titleTextTransform'=>'text-uppercase',
      'titleTextWeight'=>'font-weight-normal',
      'titleHeight'=> 50,
      'titleMarginB'=>'mb-2',
      'titleAlignVertical'=>'align-items-start',
      'numberCharactersTitle'=>40,
      'imageAspect'=>'4/3',
  ],

  /*
|--------------------------------------------------------------------------
| Pagination to the index page
|--------------------------------------------------------------------------
*/
  'pagination' => [
    "show" => true,
    /*
  * Types of pagination:
  *  normal
  *  loadMore
  *  infiniteScroll
  */
    "type" => "normal"
  ],
];
