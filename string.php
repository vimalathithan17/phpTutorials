<?php
//length
echo strlen("Hello World"); // Output: 11

//search
//first occurance
echo strpos("Hello World", "World"); // Output: 6
//last occurance
echo strrpos("Hello World, Hello", "Hello"); // Output: 13
//case insensitive (first)
echo stripos("Hello World", "world"); // Output: 6
//case insensitive (last)
echo strripos("Hello World, Hello", "hello");

//replace
echo str_replace(search:"World",replace: "PHP",subject: "Hello World"); 
// Output: Hello PHP

echo str_ireplace("world", "PHP", "Hello World"); 
// Output: Hello PHP

echo substr_replace(string:"abcdef", replacement:"123",start: 2,length: 3); 
// Output: ab123f

//substring extraction
echo substr("Hello World",start: 6,length: 5); 
// Output: World

echo substr("Hello World", start:-5,length: 3); 
// Output: Wor

//split
$str = "apple,banana,orange";
$arr = explode(",", $str);
print_r($arr);

//join
$arr = ["apple", "banana", "orange"];
echo implode(", ", $arr);
// Output: apple, banana, orange

//trim
//trim both sides
echo trim("  Hello World  "); // Output: Hello World
echo ltrim("  Hello "); // Output: "Hello "
echo rtrim("Hello  "); // Output: "Hello"

//padding
echo str_pad(input:"42",pad_length: 5, pad_string:"0",pad_type: STR_PAD_LEFT); // Output: 00042

//case conversion
echo strtolower("HELLO"); // Output: hello
echo strtoupper("hello"); // Output: HELLO
echo ucfirst("hello world"); // Output: Hello world
echo lcfirst("Hello World"); // Output: hello World
//capitalize
echo ucwords("hello world"); // Output: Hello World


//comparision 0 if eq -1 if a<b 1 if a>b
echo strcmp("apple", "banana"); // Output: -1
//case insensitive
echo strcasecmp("Hello", "hello"); // Output: 0
//firstnchar
echo strncmp("apple", "apricot", 2); // Output: 0

//checking
is_string("Hello"); // Output: bool(true)

//formatting
echo number_format(12345.6789, 2); 
// Output: 12,345.68

//regex pattern
if (preg_match("/world/i", "Hello World")) {
    echo "Match found!";
}

//to asciichar
echo chr(65);

//to asciivalue
echo ord("A");

//convert special char prevent xss
echo htmlspecialchars("<b>Hello</b>"); 
// Output: &lt;b&gt;Hello&lt;/b&gt;
//convert back
echo html_entity_decode("&lt;b&gt;Hello&lt;/b&gt;"); 
// Output: <b>Hello</b>

echo md5("password"); 
// Output: 5f4dcc3b5aa765d61d8327deb882cf99
echo sha1("password"); 
// Output: 5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8
