<?php
//functions are defined using function keyword

//no parameter
function br(){
    echo "<br>";
}

function greet() {
    echo "Hello, World!";
}

greet(); // Call the function
br();

//with parameters

function greet_name($name) {
    echo "Hello, $name!";
}
greet_name("Alice");
br();

function add($a, $b) {
    echo $a + $b;
}
add(5, 10);
br();

//return value
function multiply($x, $y) {
    return $x * $y;
}
$result = multiply(3, 4);
echo "Result: $result";
br();

//default arguments

function makeyogurt($flavour, $container = "bowl")
{
    return "Making a $container of $flavour yogurt.\n";
}

echo makeyogurt("raspberry");
br();

//variable length args
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}

echo sum(1, 2, 3, 4);
br();

function sumAll(...$numbers) {
    return array_sum($numbers);
}
echo sumAll(1, 2, 3, 4, 5);
br();

//unpacked array as arg
function add2($a, $b) {
    return $a + $b;
}

echo add2(...[1, 2])."\n"; //use ... to unpack an array

// named arguments -> ang_name:val no $ before arg name
echo add2(a:2,b:4);
br();
echo add2(1,b:3);
br();

function makeyogurt2($container = "bowl", $flavour = "raspberry", $style = "Greek")
{
    return "Making a $container of $flavour $style yogurt.\n";
}

echo makeyogurt2(style: "natural");
br();

// type hinting

function addNumbers(int $a,int $b) {
    return $a + $b;
}
echo addNumbers(1, 5);
echo addNumbers("1", 5);
// echo addNumbers("1h", 5);error
echo addNumbers("1h"+0, 5); // first "1h" is cast to numeic because of addition
echo addNumbers((int)"1h", 5); //"1h" ->1
// echo addNumbers("h", 5); error
echo addNumbers((int)"h", 5);//"h" ->0
br();
//from above the interpretation: is numeric string is converted but leading numeric is not implicitly converted in case of typed parameter 

// return type hinting
function getPrice(): float {
    return 9.99;
}
echo getPrice();
br();

//anonymous function
$greet2 = function($name) {
    printf("Hello %s\r\n", $name);
};

$greet2('World');

$message = 'hello';

// No "use"
$example = function () {
    var_dump($message); //message is not inherited from parent scope
};
$example();

// use "use" to Inherit $message closure
$example = function () use ($message) {
    var_dump($message);
};
$example();
br();

//returning  a function
function f($arg){
    return function()use($arg){
        var_dump ($arg);
    };
}

$hi=f("hi");
$hi();
$bye=f("bye");
$bye();

//passing function as arg
function callother($callback){
    $callback();
}
callother($bye);
br();

//arrow functions ->single expression, automaticaly inherits variables from parent scope
//fn(args)=> expression;
//the result of expression is returned
$x=1;
$add3=fn($y,$z)=> $x+$y+$z;
echo $add3(2,3);
br();
/*
the above function is equivalent to
add3=function($y,$z) use($x){
    return $x+$y+$z;
};
*/

//you can also mix html within your function body
function print_list($i) {
    echo "Hello, World!";
    ?>
    <li><?php echo $i*4 ?></li>
    <li><?php echo $i*3 ?></li>
<?php } ?>

<?php
print_list(3);
print_list(2);
?>
