<?php

//Encoding an Associative Array
$data = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];

$jsonString = json_encode($data);
echo "associative array: ". $jsonString;

// indexed array
$colors = ["red", "green", "blue"];
$jsonString = json_encode($colors);
echo "indexed array: ".$jsonString;

class Person {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$person = new Person("Alice", 25);
$jsonString = json_encode($person);
echo "php object: ".$jsonString;

//Decoding to an Associative Array
$jsonString = '{"name":"John","age":30,"city":"New York"}';
$data = json_decode($jsonString, true);
print_r($data);

//Decoding to an Object
$jsonString = '{"name":"John","age":30,"city":"New York"}';
$data = json_decode($jsonString);  // Default is object
print_r($data); // John

//Decoding Indexed Arrays
$jsonString = '["apple", "banana", "cherry"]';
$data = json_decode($jsonString);
print_r($data);

//Handling Invalid JSON
//If JSON is invalid, json_decode() returns null and json_last_error() helps identify the issue.
$jsonString = '{"name":"John", "age":30, '; // Missing closing }
$data = json_decode($jsonString);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error: " . json_last_error_msg();
}
