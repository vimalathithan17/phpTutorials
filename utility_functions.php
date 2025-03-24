<?php


// isset($var)	            Check if a variable is declared and not NULL
$var1 = "Hello";
$var2 = NULL;

var_dump(isset($var1)); // true
var_dump(isset($var2)); // false
var_dump(isset($undefinedVar)); // false

var_dump(isset($var1, $var2)); // false (because $var2 is NULL)


// empty($var)	            Check if a variable is unset or falsy
$var1 = "";
$var2 = 0;
$var3 = NULL;

var_dump(empty($var1)); // true (empty string is falsy)
var_dump(empty($var2)); // true (0 is falsy)
var_dump(empty($var3)); // true (NULL is falsy)
var_dump(empty($undefinedVar)); // true (not set)
if (empty($_POST['username'])) {
    echo "Username is required!";
}


// unset($var)	            Destroy a variable Unsets (removes) a variable, making it undefined.
$var = "PHP";
unset($var);
var_dump(isset($var)); // false
$a = 1;
$b = 2;
unset($a, $b);

// var_dump($var)	        Print variable type and value (debugging)
$var = 42;
var_dump($var); // int(42)

$float = 3.14;
var_dump($float); // float(3.14)

$array = [1, "PHP", true];
var_dump($array);
/*
array(3) {
  [0]=> int(1)
  [1]=> string(3) "PHP"
  [2]=> bool(true)
}
*/


// print_r($array)	        Readable array/object output

$array = ["a" => "apple", "b" => "banana"];
print_r($array);
/*
Array
(
    [a] => apple
    [b] => banana
)
*/

// gettype($var)	        Get variable type

var_dump(gettype(42)); // string(7) "integer"
var_dump(gettype(3.14)); // string(5) "double"
var_dump(gettype("Hello")); // string(6) "string"
var_dump(gettype([])); // string(5) "array"

// settype($var,"int")     Convert variable type in-place
$var = "42";
settype($var, "int"); // Converts to integer
var_dump($var); // int(42)


// boolval($var)
// intval($var), 
// floatval($var), 
// strval($var)	        Convert values to specific types
var_dump(boolval("hello")); // bool(true)
var_dump(intval("42.5")); // int(42)
var_dump(floatval("42.5")); // float(42.5)
var_dump(strval(100)); // string(3) "100"


// define("CONST", value),
//  const VAR = value	    Define constants
define("SITE_NAME", "MyWebsite");
echo SITE_NAME; // MyWebsite
const PI = 3.14159;
echo PI; // 3.14159


//  debug_zval_dump($var)	Show reference count
$var = "Hello";
$ref = &$var; // Create a reference

debug_zval_dump($var);
/*
string(5) "Hello" refcount(2)
*/
