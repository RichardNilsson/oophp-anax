<?php

require(__DIR__ . "/autoload.php");
require(__DIR__ . "/config.php");

session_name("pene14");
session_start();

if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess();
}

// Deal with incoming variables
$number  = $_POST["number"]      ?? null;
$tries   = $_POST["tries"]       ?? null;
$guess   = $_POST["guess"]       ?? null;
$doInit  = $_POST["doInit"]      ?? null;
$doGuess = $_POST["doGuess"]     ?? null;
$doCheat = $_POST["doCheat"]     ?? null;

if (isset($guess)) {
    try {
        $_SESSION["game"]->setGuess($guess);
    } catch (GuessException $e) {
        echo "Got exception: " . get_class($e) . "<hr />";
    }
}

// Render the page
require(__DIR__ . "/view/guess_my_number_post.php");
