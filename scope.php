<?php
//varible scope ->the area where a variable is acessible
/*
3 types 
function scope -> within a function
global scope -> outside all functions
static scope -> retains value between function calls 
There is no block level scope and 
The functions doesnt inherit the variable from global scope or parent scope 
"global" keyword must be used to refer a global var inside a function 

Superglobals are some predefined variables that are avilable in every scope
*/

//function scoped variable
function test() {
    $x = 10; // Local variable (function scoped)
    echo "Inside function: $x";
}
test();
echo "Outside function: $x"; // outside x is null not defined

//by default global variables are not available inside function
//use "global" keyword
$y = 20;//(global var)
function gtest() {
    global $y;
    //can also use $GLOBALS["y"]
    echo "Global variable: $y";
}
gtest();

//static variables ->are initialized once and retain their value
//only exisit in local function scope
function counter() {
    static $count = 0;
    $count++;
    echo "Count: $count <br>";
}
counter();
counter();
counter();

//no block scope so
if (true){
    $a=5;
}
echo $a . "<br>";//a is visible here

//All functions once defined are global scope  even nested functions
function outer(){
    echo "outer"."<br>";
    function inner(){
        echo "inner";
    }
}
outer();
//after 1st time outer is called, inner is defined and is accessible in global scope
inner();
