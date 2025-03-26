q<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to php</h1>
    <?php
    echo "hi" . "<br>" ;
    print "hello";
    $var=5;
    echo "<br>" . $var;

    echo "<h1>hellooo</h1>";
    ?>
    <p>whats upp</p>
    <?php 
        echo "bye","<br>","b" . "ooi";
    ?>
    <?php
    echo "php needs ; at end of each statement" . "<br>" ;
    echo "php is dynamically typed language ie variable's type is infered during runtime(you dont need to specify type) and the type of a variable is not fixed";
    echo "php is weakly typed ie it performs automatic type casting(implicit type conversions)";
    echo "use phpinfo() for system info";
    phpinfo()
    ?>
</body>
</html>


