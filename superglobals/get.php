<?php
if (isset($_GET["name"]) && isset($_GET["age"])) {
    echo "Hello, " . htmlspecialchars($_GET["name"]) . "!";
    echo " You are " . (int) $_GET["age"] . " years old.";
}
