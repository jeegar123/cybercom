<?php

use function PHPSTORM_META\map;

echo '<pre>';


/**
 *  array_change_key_case() it change case for key only
 * @param array
 * @param mode CASE_UPPER,CASE_LOWER
 */

$data = [
    'name' => 'test',
    'email' => 'test@gmail.com'
];

$data = array_change_key_case($data, CASE_UPPER);

// print_r($data);


/** 
 *   array_chunk() Chunks an array into arrays with length elements
 *   @param array
 *   @param length
 *    @param bool $preserve_keys = false  if true then give keys in numberic in all chunks
 *  @return multi demension array as per length
 */


$data = [1, 2, 3, 4, 3 => 3, 2 => 1, 7, 8, 9, 1 => 2];

// print_r(array_chunk($data, 3));
// print_r(array_chunk($data, 3, true)); // numberic order


/**
 *  array_column() Return the values from a single column in the input array
 *  @param array
 * @param coloumn
 * @param index key if we didnt give then bydefault its starts from 0 
 */

$data = array(
    'items' => array(
        array('id' => '1D2', 'item_id' => 103850),
        array('id' => '1D1', 'item_id' => 103850),
        array('id' => '1D4', 'item_id' => 129374),
        array('id' => '1D0', 'item_id' => 103850),
        array('id' => '1D9', 'item_id' => 303213)
    )
);

// print_r(array_column($data['items'], 'item_id', 'id'));


/**
 * array_combine combine key and values to one array
 * @param keys
 * @param values  
 *  keys should unique other wise override
 */

$keys = [1, 2, 3];
$data = [1, 'a', 3];

//  print_r(array_combine($keys,$data));


/**
 * array_count_values() count all values of array
 * @param array
 * 
 */

$scores = [10, 30, 20, 30, 30, 20, 10, 50, 100, 20, 50, 20];

//  print_r(array_count_values($scores));

/**
 * array_diff_assoc() compuet differcne between array values  with index checked
 * @param array
 * @param arrays
 * gave key and values from array that are not present in other arrays
 *  */

$arr1 = [
    'color' => 'red',
    'shape' => 'circle',
    'material' => 'red',
    'solid',
    'calay',
    'rs',
    100
];

$arr2 = [
    'color' => 'blue',
    'shape' => 'circle',
    'solid',
    'calay',
    'rs',
    200
];

$arr3 = [
    'color' => 'red',
    3 => 100
];
// first arr1 -arr2 =$output  
//$ouput -$arr3 so exceution in sequence
// print_r(array_diff_assoc($arr1, $arr2,$arr3));
// print_r(array_diff_assoc($arr1, $arr2));

/**
 * array_diff_key()   using keys for comparison
 *  @param array
 * @param arrays
 * comparion on keys
 */
// print_r(array_diff_key($arr1, $arr2));

/**
 *  array_diff_uassoc() same as array_diff_assoc but we can pass user callabck 
 *  @param array
 * @param arrays
 * @param user callback(function)
 */
function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b) ? 1 : -1;
}

$tmp1 = [
    'first' => 1,
    'second' => 2,
    'third' => 3,
];
$tmp2 = [
    'first1' => 1,
    'second2' => 2,
    'third3' => 3,
];
//  print_r(array_diff_uassoc($tmp1,$tmp2,"key_compare_func"));

/**
 * array_diff_ukey() key differnce using callback ,compare only key no value
 * @param array
 * @param array 
 * @param callback
 */



$array1 = array('blue'  => 10, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('blue'  => 10, 'red'  => 4, 'green'  => 3, 'purple' => 1);


// print_r(array_diff_ukey($array1, $array2, 'key_compare_func'));


/**
 *  array_diff differcne between array  values if any key doesnt have matches in other arrays the it will give output
 *  @param array
 *  @param arrays
 * 
 */

// print_r(array_diff($array1, $array2));


/**
 * array_fill_keys()  fill array with value ,uing keys
 * @param keys
 * @param value
 */

$keys = [1, 2, 3, 4];
$value = "name";

//  print_r(array_fill_keys($keys,$value));

/**
 * array_fill()  genearted araay with user value
 * @param startindex
 *@param count 
 *@param value
 */


$genrated_array = array_fill(0, 10, 'default');
//   print_r($genrated_array);

/**
 * array_filter filter array    ,remove null ,0 and we can use other in built function
 * @param array
 * @param callback
 * @param mode
 * mode
 * ARRAY_FILTER_USE_KEY - pass key as the only argument to callback instead of the value
 *  ARRAY_FILTER_USE_BOTH - pass both value and key as arguments to callback instead of the value
 * 
 */

function prime_number($num)
{
    for ($i = 2; $i <= $num - 1; $i++) {
        if ($num % $i == 0)
            return 0;
        return 1;
    }
}


$arr = [1110, 2311, 4513, 1171, 119, 23, 29, 31, 37, 10];

// print_r(array_filter($arr, "prime_number"));


// print_r(array_filter($array1, function ($key) {
//     return $key == 'red' ? 1 : 0;
// }, ARRAY_FILTER_USE_KEY));

// print_r(array_filter($array1, function ($key,$value) {
//     return $key != $value ? 1 : 0;
// }, ARRAY_FILTER_USE_BOTH));


/**
 * array_flip key become value and value become key
 * @param array
 */

$arr = [
    'key' => 'value'
];

// print_r(array_flip($arr));

/**
 * array_intersect_assoc  intersection of arrays with additional index check
 * @param array
 * @param arrays
 */

// print_r(array_intersect_assoc($array1,$array2));

/**
 * array_intersect_key intersection of arrays using keys for comparison
 * @param array
 * @param array
 * 
 */

// print_r(array_intersect_key($array1,$array2));

/**
 * array_intersect_uassoc ntersection of arrays with additional index check, compares indexes by a callback function
 * @param array
 * @param arrays
 * @param callback
 */

// print_r(array_intersect_uassoc($array1, $array2, 'strcasecmp'));

/**
 * array_intersect_ukey intersection of arrays using a callback function on the keys for comparison
 *  @param array
 *  @param array
 *  @param callback
 */




// print_r(array_intersect_ukey($array1,$array2,"key_compare_func"));

/**
 * array_intersect computer intersect of array on value
 * @param array
 * @param array
 */

// print_r(array_intersect($array1, $array2));


/**
 * array_key_exists checked is key exits in array
 *@param key
 *@param array
 */

/*  if(array_key_exists('red',$array1)){
     echo "key is exists";
 }else{
    echo "key is not exists";
 } */

/**
 * array_key_first & array_key_last give first and last key of array
 * @param array
 */

//   echo array_key_first($array1);
//   echo array_key_last($array1);

/** 
 *   array_keys()  get all keys from array
 *
 *   @param  array
 *   @param search search value key
 *  @param strict boolean like ===
 */


// print_r(array_keys($arr1, 'red', true));

/**
 *  array_values()
 *@param array
 */

//  print_r(array_values($arr));

/**
 * array_map() apply callback on each element
 * @param callback  if null then it will like zip
 * @param array 
 * 
 */

//  print_r(array_map(null,$array1,$array2));
$nums = [1, 2, 3, 4, 5, 6];
/* print_r(array_map(function ($num) {
    return $num ** -2;
}, $nums));
 */

/**
 *array_merge_recursive  merge arrays recursive ,if keys same then it append other value thier in same key
 *@param arrays
 */

$arr1 = [
    'product' => 'laptop',
    'category' => 'electronics',
    'price' => 133
];
$arr2 = [
    'product' => 'mobile',
    'category' => 'electronics',
    'price' => 2300
];

// print_r(array_merge_recursive($arr1, $arr2));


/**
 *   array_merge merge arrays ,numeric index will renumberic
 * @param array 
 */
$arr1 = [1 => 0];
$arr2 = [1 => 20, 2 => 23, 3 => 1, 4 => 23, 10 => 34, 203 => 34, 22 => 2, 0 => 1, 1 => 1];

// print_r(array_merge($arr1,$arr2));

/**
 * array_multisort 
 * @param array
 * @param order
 * @param flags
 */

// print_r(array_multisort($arr2, SORT_ASC));



//  $array = array('Alpha', 'atomic', 'Beta', 'bank');
//  $array_lowercase = array_map('strtolower', $array);
//  print_r($array_lowercase);


/**
 * array_search  search value in array and if return then return key
 * @param needle value
 * @param haystack array
 * @param strict boolean
 */

//  print_r(array_search(2,$array1));

 /**
  *array_product product of values in an array 
  *@param array
  */
  $a = array(3,3);
//   print_r(array_product($a));


  /**
   * array_shift shif the element from beginning
   * @param array
   */

//    print_r($a);
//    print_r(array_shift($a));

/**
 * array_unshift  Prepend one or more elements to the beginning of an array,first lelemnt added first like fifo
 * @param  array 
 * @param values
 */
print_r($a);
array_unshift($a,10,11);
print_r($a);

