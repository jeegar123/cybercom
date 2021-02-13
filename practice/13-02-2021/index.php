<?php

/**
 *  Array 2 file
 * 
 */
echo '<pre>';

$raw_data = [

    ['category' => 1, 'attribute' => 1, 'option' => 1],
    ['category' => 1, 'attribute' => 1, 'option' => 2],
    ['category' => 1, 'attribute' => 2, 'option' => 3],
    ['category' => 1, 'attribute' => 2, 'option' => 4],
    ['category' => 2, 'attribute' => 3, 'option' => 5],
    ['category' => 2, 'attribute' => 3, 'option' => 6],
    ['category' => 2, 'attribute' => 4, 'option' => 7],
    ['category' => 2, 'attribute' => 4, 'option' => 8]
];

// print_r($raw_data);
$tree_data = [
    '1' => [
        '1' => [
            '1' => 1,
            '2' => 2
        ],
        '2' => [
            '3' => 3,
            '4' => 4
        ]
    ],
    '2' => [
        '3' => [
            '5' => 5,
            '6' => 6
        ],
        '4' => [
            '7' => 7,
            '8' => 8
        ]
    ],
];


$convert_raw_tree = [];
foreach ($raw_data as $key => $value) {
    if (!array_key_exists($value['category'], $convert_raw_tree)) {
        $convert_raw_tree[$value['category']] = [];
    }

    if (!array_key_exists($value['attribute'], $convert_raw_tree[$value['category']])) {
        $convert_raw_tree[$value['category']][$value['attribute']] = [];
    }

    $convert_raw_tree[$value['category']][$value['attribute']][$value['option']] = $value['option'];
}

// print_r($convert_raw_tree);

$convert_tree_raw = [];

foreach ($convert_raw_tree as $category => $value) {
    foreach ($value as $attribute => $options) {
        foreach ($options as $option) {
            $convert_tree_raw[] = [
                'category' => $category,
                'attribute' => $attribute,
                'option' => $option
            ];
        }
    }
}


print_r($convert_tree_raw);
