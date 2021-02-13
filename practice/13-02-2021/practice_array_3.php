<?php
echo '<pre>';

$raw_data = [

    ['category' => 1, 'categoryname' => 'c1', 'attribute' => 1, 'attributename' => 'a1', 'option' => 1, 'optionname' => 'o1'],
    ['category' => 1, 'categoryname' => 'c1', 'attribute' => 1, 'attributename' => 'a1', 'option' => 2, 'optionname' => 'o2'],
    ['category' => 1, 'categoryname' => 'c1', 'attribute' => 2, 'attributename' => 'a2', 'option' => 3, 'optionname' => 'o3'],
    ['category' => 1, 'categoryname' => 'c1', 'attribute' => 2, 'attributename' => 'a2', 'option' => 4, 'optionname' => 'o4'],
    ['category' => 2, 'categoryname' => 'c2', 'attribute' => 3, 'attributename' => 'a3', 'option' => 5, 'optionname' => 'o5'],
    ['category' => 2, 'categoryname' => 'c2', 'attribute' => 3, 'attributename' => 'a3', 'option' => 6, 'optionname' => 'o6'],
    ['category' => 2, 'categoryname' => 'c2', 'attribute' => 4, 'attributename' => 'a4', 'option' => 7, 'optionname' => 'o7'],
    ['category' => 2, 'categoryname' => 'c2', 'attribute' => 4, 'attributename' => 'a4', 'option' => 8, 'optionname' => 'o8']

];

$tree_data = [
    'category' => [
        '1' => [
            'name' => 'c1',
            'attribute' => [
                '1' => [
                    'name' => 'a1',
                    'option' => [
                        '1' => [
                            'name' => 'o1'
                        ],
                        '2' => [
                            'name' => 'o2'
                        ]
                    ]
                ],
                '2' => [
                    'name' => 'a2',
                    'option' => [
                        '3' => [
                            'name' => 'o3'
                        ],
                        '4' => [
                            'name' => 'o4'
                        ]
                    ]
                ]
            ]
        ],
        '2' => [
            'name' => 'c2',
            'attribute' => [
                '3' => [
                    'name' => 'a3',
                    'option' => [
                        '5' => [
                            'name' => 'o5'
                        ],
                        '6' => [
                            'name' => 'o6'
                        ]
                    ]
                ],
                '4' => [
                    'name' => 'a4',
                    'option' => [
                        '7' => [
                            'name' => 'o7'
                        ],
                        '8' => [
                            'name' => 'o8'
                        ]
                    ]
                ]
            ]
        ]
    ]
];


// print_r($tree_data);

$converted_raw_to_tree = [];
foreach ($raw_data as $key => $value) {
    if (!array_key_first($converted_raw_to_tree) == 'category') {
        $converted_raw_to_tree['category'] = [];
    }
    if (!array_key_exists($value['category'], $converted_raw_to_tree['category'])) {
        $converted_raw_to_tree['category'][$value['category']] = [];
    }
    $converted_raw_to_tree['category'][$value['category']]['name'] = $value['categoryname'];
    if (!array_key_exists('attribute', $converted_raw_to_tree['category'][$value['category']])) {
        $converted_raw_to_tree['category'][$value['category']]['attribute'] = [];
    }
    if (!array_key_exists($value['attribute'],  $converted_raw_to_tree['category'][$value['category']]['attribute'])) {
        $converted_raw_to_tree['category'][$value['category']]['attribute'][$value['attribute']] = [];
    }
    $converted_raw_to_tree['category'][$value['category']]['attribute'][$value['attribute']]['name'] = $value['attributename'];
    if (!array_key_exists('option',  $converted_raw_to_tree['category'][$value['category']]['attribute'][$value['attribute']])) {
        $converted_raw_to_tree['category'][$value['category']]['attribute'][$value['attribute']]['option'] = [];
    }
    $converted_raw_to_tree['category'][$value['category']]['attribute'][$value['attribute']]['option'][$value['option']]['name'] = $value['optionname'];
}

// print_r($converted_raw_to_tree);


$convert_tree_to_raw = [];

foreach ($tree_data as $key => $categories) {
    foreach ($categories as $categoryValue => $categoryData) {

        foreach ($categoryData['attribute'] as $attribute => $attributeData) {
            foreach ($attributeData['option'] as $option => $optionname) {

                $convert_tree_to_raw[] = [
                    'category'=>$categoryValue,
                    'categoryname'=>$categoryData['name'],
                    'attribute'=>$attribute,
                    'attributename'=>$attributeData['name'],
                    'option'=>$option,
                    'optionname'=>$optionname['name']
                ];
            }
        }
    }
}



print_r($convert_tree_to_raw);
