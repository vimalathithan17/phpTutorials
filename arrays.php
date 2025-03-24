<?php
// array(
//     key  => value,
//     key2 => value2,
//     key3 => value3,
//     ...
// )

//  The key can either be an int or a string.
//  The value can be of any type.(heterogenous)
//  Additionally the following key casts will occur:
//      Strings containing valid decimal ints, 
//          unless the number is preceded by a + sign,
//          will be cast to the int type. 
//          E.g. the key "8" will actually be stored under 8.
//          On the other hand "08" will not be cast, 
//          as it isn't a valid decimal integer.
//      Floats are also cast to ints, 
//          which means that the fractional part will be truncated. 
//          E.g. the key 8.7 will actually be stored under 8.
//      Bools are cast to ints, too, 
//          i.e. the key true will actually be stored under 1 
//          and the key false under 0.
//      Null will be cast to the empty string, 
//          i.e. the key null will actually be stored under "".
//      Arrays and objects can not be used as keys. 
//          Doing so will result in a warning: Illegal offset type.
 
//  If multiple elements in the array declaration use the same key,
//      only the last one will be used as all others are overwritten. 

// numeric array
$fruits = array("Apple", "Banana", "Orange");  // Old way
$fruits = ["Apple", "Banana", "Orange"];       // New way (Preferred)
echo $fruits[0]; // Output: Apple

//display array
print_r($fruits);

//length of array
echo count($fruits); // Output: 3

//looping 
foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

//adding elements to array
//The key is optional. If it is not specified, 
// PHP will use the increment of the largest previously used int key. 
$fruits[] = "Grapes";  // Adds to the end

array_push($fruits, "Mango", "Papaya"); // Add multiple

//associative array
$array = array(
    "foo" => "bar",
    "bar" => "foo",
);
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
echo $person["name"];

foreach ($person as $key => $value) {
    echo "$key: $value <br>";
}

//multidimentional array
$students = [
    ["John", 25, "New York"],
    ["Alice", 22, "Los Angeles"],
    ["Bob", 27, "Chicago"]
];

echo $students[0][0]; // Output: John

$users = [
    "user1" => ["name" => "John", "age" => 30],
    "user2" => ["name" => "Alice", "age" => 25]
];

echo $users["user1"]["name"]; // Output: John

//looping
foreach ($users as $userKey => $userDetails) {
    echo "User: $userKey <br>";
    foreach ($userDetails as $key => $value) {
        echo "$key: $value <br>";
    }
}

//adding elements ->indexed array
$arr=["hello",1,3];
$arr[]=4;//end
array_push($arr,4,"hi","bye");//end ,reindexes
array_unshift($arr,"heyy","tata");//begining ,reindexes

//adding elements associative array
$arr=["one"=>1,"two"=>2];
$arr["three"]=3;

//removing elements
$arr=[1,2,3,4,5];
unset($arr[2]);
$removed_arr=array_splice($arr,offset:2,length:1,replacement:[1,2,3]);//reindexes
$removed=array_shift($arr);//rm from first rendex
$removed=array_pop($arr);//rm from last no reindex


$arr = ["a" => 1, "b" => 2, "c" => 3];
end($arr); // Move internal pointer to the last element
$lkey = key($arr); // Get key
$lvalue = current($arr); // Get value
$lkey = array_key_last($arr); // Get last key
$lvalue = array_pop($arr); // Remove last value

reset($arr); // Move pointer to the first element
$fkey = key($arr); // Get first key
$fvalue = current($arr); // Get first value
$fkey = array_key_first($arr); // Get first key
$fvalue = array_shift($arr); // Remove first value

//checking elements
$arr = ["a" => 1, "b" => 2, "c" => 3];
isset($arr["b"]);
echo array_key_exists("a", $arr);
in_array(2, $arr);

//reversing
$arr = [1, 2, 3, 4, 5];
$result = array_reverse($arr,preserve_keys:false);
print_r($result);

//sorting
$a=[1,2,3];
$b = ["a" => 1, "b" => 2, "c" => 3];
//only on numeric indexed array

sort($a);
rsort($a);
usort($a,function($first,$second){
    return $first-$second;
    /* works by thinking in ascending
    if return value
    -ve first<second first comes before second
    +ve first>second first comes after second
    0 no change
    */
    }
);

//on all arrays
asort($b);
arsort($b);
ksort($b);
krsort($b);
uasort($b,function ($val1,$val2){
    return $val1-$val2;
});

uksort($b,function ($key1,$key2){
    return strlen($key1)-strlen($key2);
});
$b = ["a" => 1, "b" => 2, "c" => 3];
$val_arr=array_values($arr);
$key_arr=array_keys($arr);
$flipped=array_flip($b);

$arr=explode(',',"hi,i,am");
$str=implode(";",$arr);
$str2=join('^',$arr);

$arr=array_merge([1,2,3],[4,5,6]);
$keys=['a','b','c'];
$val=[1,2,3];
$ass=array_combine($keys,$val);

//filter
$arr = [1, 2, 3, 4, 5, 6];

// Keep only even numbers
$result = array_filter($arr, fn($num) => $num % 2 === 0);
print_r($result);//not reindexed
$arr = ["apple" => 100, "banana" => 50, "cherry" => 30];

// Keep items priced above 50
$result = array_filter($arr, fn($price) => $price > 50);
print_r($result);
$arr = ["apple" => 100, "banana" => 50, "cherry" => 30];

// Remove "banana" using keys
$result = array_filter($arr, fn($key) => $key !== "banana", ARRAY_FILTER_USE_KEY);

print_r($result);

//useboth
$arr = [10, 20, 30, 40, 50];
$result = array_filter($arr, function ($value, $key) {
    return $value > 20 && $key % 2 === 0; // Keep values > 20 and at even indices
}, ARRAY_FILTER_USE_BOTH);

print_r($result);

//map
$arr = [1, 2, 3, 4, 5];
$result = array_map(fn($num) => $num * 2, $arr);
print_r($result);

$numbers = [1, 2, 3];
$words = ["one", "two", "three"];

$result = array_map(fn($num, $word) => "$num - $word", $numbers, $words);
print_r($result);

//reduce
$numbers = [1, 2, 3, 4, 5];
$result = array_reduce($numbers, function ($carry, $item) {
    return $carry + $item;
}, 0);
echo $result; // Output: 15

//fill
//indexed array
$result = array_fill(start_index:0,num: 5,value: "hello");
print_r($result);

//keys given
$keys = ["name", "age", "city"];
$result = array_fill_keys($keys, "unknown");
print_r($result);

//destructuring
$data = [100, 200, 300];
[$x, $y, $z] = $data;
echo "$x, $y, $z"; // Output: 100, 200, 300

$source_array = ['foo' => 1, 'bar' => 2, 'baz' => 3];
['baz' => $three] = $source_array;
echo $three;

$source_array = ['foo', 'bar', 'baz'];
// Assign the element at index 2 to the variable $baz
[2 => $baz] = $source_array;

//unpacking (allelements)
$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];

$merged = [...$arr1, ...$arr2];

print_r($merged);

function add($a, $b, $c) {
    return $a + $b + $c;
}
$data = [2, 3, 5];
echo add(...$data); // Output: 10

is_array($arr);