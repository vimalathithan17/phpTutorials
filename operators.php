<?php
//Arithmetic
// +	Addition	
5 + 3;
// -	Subtraction
5 - 3;
// *	Multiplication	
5 * 3;
// /	Division	
10 / 2;
// %	Modulus (Remainder)	
10 % 3;
// **	Exponentiation	
2 ** 3;

echo 'Post-increment:', PHP_EOL;
$a = 5;
var_dump($a++);
var_dump($a);

echo 'Pre-increment:', PHP_EOL;
$a = 5;
var_dump(++$a);
var_dump($a);

echo 'Post-decrement:', PHP_EOL;
$a = 5;
var_dump($a--);
var_dump($a);

echo 'Pre-decrement:', PHP_EOL;
$a = 5;
var_dump(--$a);
var_dump($a);


//Assignment
// = Assign
$x = 10;	
// +=	Add and assign	
$x += 5;
// -=	Subtract and assign	
$x -= 3;
// *=	Multiply and assign	
$x *= 2;
// /=	Divide and assign	
$x /= 4;
// %=	Modulus and assign	
$x %= 2;
// **= exponent and assign
$x**=2;

//bitwise
// &	AND	
5 & 3 ;//(0101 & 0011 → 0001 → 1)
// |	OR
5 | 3; //(0101 | 0011 → 0111 → 7)
// ^	XOR	
5 ^ 3;// (0101 ^ 0011 → 0110 → 6)
// ~	NOT
	~5;// (~0101 ->1010 ->10) (Bitwise negation)
// <<	Left Shift	
2 << 1 ;//(Shift left)
// >>	Right Shift	
4 >> 1;// (Shift right)

//comparison operates on values and returns boolean 
// if operand of > ,>= ,<, <= is boolean , false becomes 0 , true becomes 1 before comparision
// ==	Equal	after type jugglig
5 == "5";//	true (value match)
// ===	Identical no type jugling
5 === "5";//	false (type mismatch)
// != or <>	Not equal after typejugling
5 != 10	;//true
// !==	Not identical no type jugling
5 !== "5";	//true
// >	Greater than	
10 > 5	;//true
// <	Less than	
3 < 5	;//rue
// >=	Greater than or equal	
5 >= 5	;//true
// <=	Less than or equal	
3 <= 3	;//true
// <=>	Spaceship	
10 <=> 5;//1 (Returns 1, 0, -1)
/*
Note:
When using the comparison operator (==),
    object variables are compared in a simple manner, 
    namely: Two object instances are equal 
    if they have the same attributes and values (values are compared with ==), 
    and are instances of the same class.
When using the identity operator (===), 
    object variables are identical 
    if and only if they refer to the 
    same instance of the same class. 
*/

//Null Coalescing Operator ?? -> 1st not null value or the last value
$foo = null;
$bar = null;
$baz = 1;
$qux = 2;

echo $foo ?? $bar ?? $baz ?? $qux; // outputs 1


//logical operates on boolean and retrurn boolean
// && , and	AND	
true && false;//	false
true and false;//	false
// || , or	OR
true || false;//	true
true or false;//	true
// !	NOT	
!true	;//false
// xor	XOR	
true xor false;//	true


//string
// .	Concatenation	
$str ="Hello " . "World";	
// .= 	Concatenation assignment
$str .= "PHP";

//Array
// $a + $b 	Union 	            Union of $a and $b.
$arr1 = ["a" => 1, "b" => 2];
$arr2 = ["b" => 3, "c" => 4];
$result = $arr1 + $arr2; 
// $a == $b 	Equality 	    true if $a and $b have the same key/value pairs.
// $a === $b 	Identity 	    true if $a and $b have the same key/value pairs in the same order and of the same types.
// $a != $b 	Inequality 	    true if $a is not equal to $b.
// $a <> $b 	Inequality 	    true if $a is not equal to $b.
// $a !== $b 	Non-identity 	true if $a is not identical to $b.

// Execution `` backtick
$output = `ls -al`;
echo "<pre>$output</pre>";

//instanceof
class MyClass
{
}

class NotMyClass
{
}
$a = new MyClass;

var_dump($a instanceof MyClass);
var_dump($a instanceof NotMyClass);



class ParentClass
{
}

class NClass extends ParentClass
{
}

$a = new NClass;

var_dump($a instanceof NClass);
var_dump($a instanceof ParentClass);

