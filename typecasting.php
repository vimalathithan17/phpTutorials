<?php
    /*
    type jugling
    PHP may attempt to convert the type of a value 
    to another "automatically" in certain contexts.
    The different contexts which exist are:

    Numeric
    String
    Logical
    Integral and string
    Comparative
    Function

    */
    /*
    Numeric context:
        This is the context when using an arithmetical operator.
        In this context if either operand is a float (or not interpretable as an int), 
        both operands are interpreted as floats, 
        and the result will be a float. 
        Otherwise, the operands will be interpreted as ints,
         and the result will also be an int. 
        As of PHP 8.0.0, if one of the operands cannot be interpreted a TypeError is thrown. 
    
    String context
        This is the context when using 
        echo, 
        print,
        string interpolation, 
        the string concatenation operator.
        In this context the value will be interpreted as string. 
        
    
    Logical contexts
        This is the context when using 
        conditional statements (if else),
        the ternary operator (?:),
        or a logical operator (|| && ! and or xor ).

        In this context the value will be 
        interpreted as bool.

    Integral and string contexts
        This is the context when using bitwise operators.
        In this context if all operands are of type string the result will also be a string. 
        Otherwise, the operands will be interpreted as ints, and the result will also be an int. 

    
    Comparative contexts
        This is the context when using a comparison operator.
        
        Type of Operand 1 	Type of Operand 2 	Result
        null or string 	    string 	            Convert null to "", numerical or lexical comparison
        
        bool or null 	    anything 	        Convert both sides to bool, false < true
        
        object 	            object 	            Built-in classes can define its own comparison, 
                                                different classes are incomparable, same class see Object Comparison
        
        string,             string,             Translate strings and resources to numbers, usual math
        resource,           resource,
        int or float 	    int or float 	
        
        array 	            array 	            Array with fewer members is smaller, 
                                                if key from operand 1 is not found in operand 2 
                                                then arrays are incomparable, 
                                                otherwise - compare value by value 
                                                (see following example)
        
        object 	            anything 	        object is always greater
        
        array 	            anything 	        array is always greater
    
    Function contexts 
        This is the context when a value is passed to a "typed parameter", 
        property, or returned from a function which declares a return type.

        In this context the value must be a value of the type.
         Two exceptions exist, 
         the first one is: 
            if the value is of type int and the declared type is float, 
            then the integer is converted to a floating point number. 
        The second one is: 
            if the declared type is a scalar type, 
            the value is convertable to a scalar type, 
            and the coercive typing mode is active (the default), 
            the value may be converted to an accepted scalar value. 
            See below for a description of this behaviour. 
    
    Coercive typing with simple type declarations 

        bool type declaration: value is interpreted as bool.
        int type declaration: value is interpreted as int if the conversion is well-defined. For example the string is numeric.
        float type declaration: value is interpreted as float if the conversion is well-defined. For example the string is numeric.
        string type declaration: value is interpreted as string.


    
   */  


    /*
    Type Casting
        Type casting converts the value to a chosen type by writing the type within parentheses before the value to convert.

    The casts allowed are:

    (int) - cast to int
    (bool) - cast to bool
    (float) - cast to float
    (string) - cast to string
    (array) - cast to array
    (object) - cast to object
    (unset) - cast to NULL

    eg:
    $var=(int) 12.5
    can also use these functions to Convert values to specific types
    boolval($var)
    intval($var), 
    floatval($var), 
    strval($var)	       
        
    settype vs typecast using (type) $var

    settyype modifies the type of the variable in place and returnd true if the operation was sucessfull
    settype($var, "type") where type can be "integer", "double", "string", "array", "object", "bool", "null"
    
    typecast using (type) creates a new value with given type
    $newVar = (type) $var
    */
    
    /*
    Converting to Objects

    You can convert arrays and scalars into objects.
    
    A scalar becomes an object with a property named scalar.
    
    Associative array keys become object properties
    */
    $var = "PHP";
    $obj = (object) $var;
    echo $obj->scalar; // Output: PHP

    $array = ["name" => "John", "age" => 30];
    $obj = (object) $array;
    echo $obj->name; // Output: John

    /*
    Converting to Arrays

    You can convert scalars, objects, and other types to arrays.
    */

    $var = "Hello";
    $arr = (array) $var;
    print_r($arr);

    /*
    Integer conversion:
    null -> 0
    numeric string: coresponding number
    "12" ->12
    leading numeric string:coresponding number
    "16hi"-> 16
    other string ->0

    float:rounded towards 0:
    12.4->12
    12.7->12
    
    boolean:
    false ->0
    true->1
    */

    /*
    float conversion
    numeric/leading numeric string -> coresponding float
    "12.5"->12.5
    "12.5hi"->12.5
    other string -> 0

    other types:
    converted to int then to float
    */
    
    /*
    string conversions
    in places where string is expected like echo,print and when a variable is compared to string
    
    boolean :
    true -> "1"
    false -> ""

    int/float -> "respectedvalue"
    eg : 12 -> "12"

    array: the word "Array"
    [1,2] -> "Array"

    null -> ""

    objects -> as per their __toString method
    */
    
    /*
    boolean conversion
    Falsy values (evaluates to false in conditions):

    false

    0 (integer zero)

    0.0 (float zero)

    "" (empty string)

    "0" (string zero)

    [] (empty array)

    NULL

    an unset variable

    Any other value is truthy
    */


    