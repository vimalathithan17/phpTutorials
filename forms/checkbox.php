<?php
require_once "htmlutils.php"; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo createElement("h1","My hobbies are");
    echo createOpeningTag("ul");
    foreach($_POST['hobbies'] as $hobby){
        echo createElement("li",$hobby);
    }
    echo createClosingTag("ul");
}
