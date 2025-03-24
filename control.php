<?php
$age = 20;
//if
if ($age >= 18) {
    echo "You are eligible to vote.";
}

$age = 16;

//if else
if ($age >= 18) {
    echo "You can vote.";
} else {
    echo "You are too young to vote.";
}

$marks = 85;
// if elseif else
if ($marks >= 90) {
    echo "Grade: A";
} elseif ($marks >= 80) {
    echo "Grade: B";
} elseif ($marks >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: F";
}

$day = "Monday";

//switch  weak comparision ==
switch ($day) { 
    case "Monday":
        echo "Start of the workweek!";
        break;
    case "Friday":
        echo "Weekend is near!";
        break;
    case "Sunday":
        echo "Enjoy your weekend!";
        break;
    default:
        echo "Just another day!";
}

//match
/*
strict comparision === 
must be exhaustive 
returns value 
stops after first match
semicolon at end
*/
$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

$expressionResult = match ($condition) {
    1, 2 => foo(),
    3, 4 => bar(),
    default => baz(),
};

$age = 20;

$output = match (true) {
    $age < 2 => "Baby",
    $age < 13 => "Child",
    $age <= 19 => "Teenager",
    $age >= 40 => "Old adult",
    $age > 19 => "Young adult",
};

// ternary
$age = 20;
echo ($age >= 18) ? "Adult" : "Minor";

// nullish coleasing
$value = $variable ?? "default_value";


//alternative syntax
/*
controlstructure :

endcontrolstructure;
*/
$a=5;
if ($a == 5):
    echo "a equals 5";
    echo "...";
elseif ($a == 6):
    echo "a equals 6";
    echo "!!!";
else:
    echo "a is neither 5 nor 6";
endif;

switch ($i):
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
    default:
        echo "i is not equal to 0, 1 or 2";
endswitch;

//use with html
$loggedIn = true;

?>
<?php if ($loggedIn): ?>
    <h1>Welcome, User!</h1>
<?php else: ?>
    <h1>Please Log In</h1>
<?php endif; ?>

<?php if ($loggedIn){?>
    <h1>Welcome, User!</h1>
<?php } else {?>
    <h1>Please Log In</h1>
<?php } ?>
