<!-- <?php phpinfo(); ?> -->
<?php
class a{

}
// echo $b;
// $var=2;
// function f(){
//     global $var;
//     $var=6;
//     unset($var);
//     echo "hi",$var,"<br>",$GLOBALS["var"],"<br>";
// }
// $v2="h";
// if(false){
//     $ba="aa";
//     $v2=&$ba;
// }
// echo $v2,$ba;
// f();
// unset($var);
$obj=new a();
$obj->a=5;
$obj2=&$obj;
$obj2->b="hi";
$obj3=$obj2;
$obj3->c=5;
// $obj2=7;
// unset($obj2);
echo($obj3===$obj);
print_r($obj);
print_r($obj2);
print_r($obj3);
// $arr=[1,2,3,4];
// $brr=$arr;
// $brr[]=6;
// $crr=&$arr;
// $crr[]=1;
// print_r($arr);
// echo '<br>';
// print_r($brr);
// print_r($crr);
// // array_splice($arr,1,1);
// print_r($arr);
// print_r(array_slice($arr,1,2));
// $a=5;
// $b=&$a;
// $b=7;
// $c=9;
// $b=&$c;
// echo $a . ',' . $b;
?>