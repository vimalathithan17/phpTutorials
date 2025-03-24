<?php
//variables start with $ followed by name
//name starts with A-Z or a-z or _
//can contain A-Z ,a-z,_,0-9
//variables doesnt have a fixed type

$a=5;
$h="a";

//variable variavle
echo $$h; //$a

$b="hi";
$$b=9;//$hi=9
echo $hi;



