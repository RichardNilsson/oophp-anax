<?php

// Render the page
?><h1>Guess my number (POST)</h1>

<form method="post" action="">
    <input type="text" name="guess">
    <input type="hidden" name="number" value="<?= $_SESSION["game"]->number(); ?>">
    <input type="hidden" name="tries" value="<?= $_SESSION["game"]->tries(); ?>">
    <input type="submit" name="doGuess" value="Make a guess">
    <input type="submit" name="doCheat" value="Cheat">
    <input type="submit" name="doInit" value="Start from beginning">
</form>

<?php if ($_SESSION["game"]->tries > 0) : ?>
    <?php if ($doGuess) : ?>
        <p>Your guess: <?= $_SESSION["game"]->userGuess() ?> is <strong>
                <?= $_SESSION["game"]->makeGuess($_SESSION["game"]->userGuess()); ?></strong></p>
    <?php endif; ?>
<?php endif; ?>


<?php if ($doInit) : ?>
    <?php $_SESSION["game"]->destroySession(); ?>
<?php endif; ?>


<?php if ($doCheat) : ?>
    <p>CHEAT: Current number is <strong><?= $number ?></strong>.</p>
<?php endif; ?>

<p>Guess a number between 1 and 100, you have <?= $_SESSION["game"]->tries();  ?> left.</p>
