<?php
require_once "htmlutils.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(is_array($_POST['colors'])){
        echo createElement("h2","The colors I like are");
        echo createOpeningTag("ul");
        foreach($_POST['colors'] as $color){
            echo createElement("li",$color);
        }
        echo createClosingTag("ul");
    }
    else{
        echo createElement("p","The color I like is {$_POST['colors']}");
    }
}
