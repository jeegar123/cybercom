<?php


require './Database.php';

$data = array(

    "farmer" => array(

        "childrens" => array(

            "laywer" => array(

                "childrens" => array(
                    "child1" => 1,
                    "child2" => 2
                )
            ),
            "doctor" => array(
                "childrens" => array(
                    "child1" => 1,
                    "child2" => 2
                )

            ),

            "politican" => array(
                "childrens" => array(
                    "child1" => 1,
                    "child2" => 2
                )
            )


        )

    )

);


// echo "<pre>";
// print_r($data);
// echo "</pre>";
//  example data [child2,laywer,farmer]
$raw_data = [];


foreach ($data as $farmers['childrens'] => $childrens) {
    foreach ($childrens as $child => $position) {
        foreach ($position as $positionkey => $current) {
            foreach ($current as $childKey => $value) {
                foreach ($value as $lastkey => $currentdata) {

                    array_push($raw_data, [
                        $currentdata,
                        $positionkey,
                        array_key_first($data)
                    ]);
                }
            }
        }
    }
}

// echo "<pre>";

// print_r($raw_data);
// echo "</pre>";


// insert into Database
// $database = new Database("localhost","root","","trainning_db");
// $count=0;
// foreach($raw_data as $row){
//     if(@$database->insert("raw_data",$row));{
//         echo "data inserted<br>";
//         $count++;
//     }
// }
// echo "$count = ".count($raw_data);


$childs = [];

foreach ($raw_data as $key => $data) {

    // if (isset($childs[$data[1]]) and array_key_exists("child2", $childs[$data[1]]['childrens'])) {
    //     $childs[$data[1]] = [
    //         "childrens" => ['child2' => $data[0]]

    //     ];
    //     echo "a";
    // } else {
    //   
    //     echo "b";
    // }


    if (isset($childs[$data[1]]) and !array_key_exists("child2", $childs[$data[1]]['childrens'])) {

        $childs[$data[1]] = array_merge_recursive($childs[$data[1]], [
            "childrens" => ['child2' => $data[0]]
        ]);
    } else {

        $childs[$data[1]] = [
            "childrens" => ['child1' => $data[0]]
        ];
    }
}

echo "<pre>";
$original_data = ["farmers" => [
    "childrens" => $childs
]];
print_r($original_data);
echo "</pre>";

// $temp1['a'] = [
//     "childrens" => ['child1' => 'a']

// ];
// $temp2['a'] = [
//     "childrens" => ['child2' => 'b']
// ];

// echo "<pre>";
// print_r(array_merge_recursive($temp1,$temp2));
// echo "</pre>";

