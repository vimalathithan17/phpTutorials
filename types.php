<?php
    //scalar int,float,string,bool

    //integer
    $num=45;
    $hex = 0x1A;  // Hexadecimal (26)
    $oct = 012;   // Octal (10)
    $bin = 0b101; // Binary (5)


    //float 
    $price = 19.99;
    $exp = 1.2e3; // 1200
    
    //string
    $var="heloo";//double quote
    $var2='boi';//single quote
    $var = "world";
    echo 'Hello $var';  // Outputs: Hello $var (no variable expansion)
    echo "Hello $var";  // Outputs: Hello world (variable expansion)
    $var[2]='e';//mutable
    echo $var;

    /*
    string intrapolation
    $var=45
    "somestring $var" ->"somestring 45"
    "somestring {$var}" -> "somestring 45"
    */

    //bool ->true / false case insensitive 
    $is_admin = true;
    var_dump($is_admin); // bool(true)
    $not_admin=False;
    
    unset($var2);
    echo "hi",$var2==false;

    //Array (array)->    Stores multiple values in an indexed or associative format.
    $colors = ["red", "green", "blue"];
    $person = ["name" => "Alice", "age" => 25];

    // Object (object) -> Stores instances of user-defined classes.
    class Car {
        public $brand = "Toyota";
    }
    $myCar = new Car();
    var_dump($myCar);    

    // Callable (callable) -> A reference to a function (anonymous or named).
    function greet($name) {
        return "Hello, $name!";
    }
    $greeting = "greet";
    echo $greeting("Alice"); // Hello, Alice!
    
    // Iterable (iterable)->  Used in foreach loops and function arguments.
    
    $item=[1,2,3];
    foreach ($items as $item) {
        echo $item . " ";
    }
    function gen_one_to_three() {
        for ($i = 1; $i <= 3; $i++) {
            // Note that $i is preserved between yields.
            yield $i;
        }
    }
    $generator = gen_one_to_three();
    foreach ($generator as $value) {
        echo "$value\n";
    }

    //special types -> null , resource
    //null case insensitive
    $var=null;
    /*
        undefined and unset variables resolve to null
    */

    //Resource (resource)->    A special type holding references to external resources (e.g., database connections, file handles).
    $file = fopen("test.txt", "r");
    var_dump($file); // resource of type (stream)
    
    

    // functions to get type
    //gettype($var) -> returns a sting mentioning the type of $var
    $var=12;
    $v=gettype($var);
    echo "<br>",$var,$v,gettype($v);
    
    //functions to check type
    
    // is_int() / is_integer() / is_long()	An integer	
    echo "<br>is_int(10) ",is_int(10);
    // is_float() / is_double() / is_real()	A floating-point number	
    echo "<br>is_float(3.14) ",is_float(3.14) ;
    // is_numeric()	A number or numeric string	
    echo "<br>is_numeric('100') ",is_numeric("100") ;
    // is_string()	A string	
    echo "<br>is_string('hello') ",is_string("hello") ;
    // is_bool()	A boolean (true or false)	
    echo "<br>is_bool(false) ",is_bool(false) ;
    // is_null()	NULL	
    echo "<br>is_null(NULL) ",is_null(NULL); 
    // is_scalar()	A scalar value (int, float, string, or bool)	
    echo "<br>is_scalar(42) ",is_scalar(42) ;
    // is_array()	An array	
    echo "<br>is_array([1, 2, 3]) ",is_array([1, 2, 3]) ;
    // is_object()	An object	
    echo "<br>is_object(new stdClass()) ",is_object(new stdClass()) ;
    // is_resource()	A resource (e.g., file handle, database connection)	
    echo "<br>is_resource(fopen('file.txt', 'r')) ",is_resource(fopen("file.txt", "r"));
    // is_callable()	A callable function/method	
    echo "<br>is_callable('strlen') ",is_callable("strlen"); 
    // is_iterable()	An iterable (array or object implementing Traversable)	
    echo "<br>is_iterable([1, 2, 3]) ",is_iterable([1, 2, 3]);