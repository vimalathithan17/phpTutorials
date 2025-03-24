<?php
//for
for ($i = 1; $i <= 5; $i++) {
    echo "Iteration: $i <br>";
}

//while
$count = 1;
while ($count <= 5) {
    echo "Count: $count <br>";
    $count++;
}

//do-while

$num = 10;
do {
    echo "Number: $num <br>";
    $num++;
} while ($num <= 5);

//foreach
$fruits = ["Apple", "Banana", "Cherry"];

foreach ($fruits as $fruit) {
    echo "$fruit <br>";
}

$person = ["name" => "John", "age" => 30, "city" => "New York"];

foreach ($person as $key => $value) {
    echo "$key: $value <br>";
}


//break

for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        break;
    }
    echo "Iteration: $i <br>";
}

//continue
for ($i = 1; $i <= 5; $i++) {
    if ($i == 3) {
        continue;
    }
    echo "Iteration: $i <br>";
}

//alternative syntax

$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;

for ($i = 1; $i <= 5; $i++):
    echo "Iteration: $i <br>";
endfor;

foreach ($fruits as $fruit):
    echo "$fruit <br>";
endforeach;