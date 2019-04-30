<?php
use Pene\Guess\GuessException;

/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));

/**
 * Showing message Hello World, not using the standard page layout.
 */
$app->router->get("guess/init", function () use ($app) {
    // echo "Some debugging information";
    $game = new Pene\Guess\Guess();

    $_SESSION["number"] = $game->number() ?? null;
    $_SESSION["tries"]  = $game->tries()  ?? null;

    return $app->response->redirect("guess/play");
});



/**
 * Play the game - show game status
 */
$app->router->get("guess/play", function () use ($app) {
    $title = "Play the game";

    // Get current settings from SESSION
    $tries   = $_SESSION["tries"]   ?? null;
    $res     = $_SESSION["res"]     ?? null;
    $guess   = $_SESSION["guess"] ?? null;

    $_SESSION["res"] = null;
    $_SESSION["guess"] = null;

    $data = [
        "guess"   => $guess    ?? null,
        "tries"   => $tries,
        "number"  => $number   ?? null,
        "res"  => $res,
        "doGuess" => $doGuess  ?? null,
        "doCheat" => $doCheat  ?? null,
    ];

    $app->page->add("guess/play", $data);
    $app->page->add("guess/debug");


    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Play the game - make a guess
 */
$app->router->post("guess/play", function () use ($app) {
    // // Deal with incoming variables
    $guess   = $_POST["guess"]       ?? null;
    $doGuess = $_POST["doGuess"]     ?? null;

    // Get current settings from SESSION
    $number = $_SESSION["number"];
    $tries  = $_SESSION["tries"];

    if ($doGuess && $tries >= 1) {
        // Make a guess
        $game = new Pene\Guess\Guess($number, $tries);
        try {
            $res  = $game->makeGuess($guess);
        } catch (GuessException $e) {
        echo "Got exception: " . get_class($e) . "<hr />";
            }

        if ($guess != $number) {
            $_SESSION["tries"] = $game->tries();
        } else {
            $_SESSION["tries"] = 0;
        }
        $_SESSION["res"]   = $res;
        $_SESSION["guess"] = $guess;
    }

    return $app->response->redirect("guess/play");
});
