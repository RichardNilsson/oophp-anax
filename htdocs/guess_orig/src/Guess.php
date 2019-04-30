<?php
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */

    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the current number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct(int $number = 1, int $tries = 6)
    {
        $this->random($number);
        $this->tries = $tries;
    }

    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @return void
     */
    public function random()
    {
        $this->number = random_int(1, 100);
    }

    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function tries()
    {
        return $this->tries;
    }

    /**
     * Set the guess propery of Guess
     *
     * @param string $userGuess
     * @return void
     */
    public function setGuess(string $userGuess)
    {
        if ($userGuess !== '') {
            if ($userGuess > 100 || $userGuess < 1) {
                throw new GuessException("Number must be between 1 and 100.");
            }
        }
        $this->guess = $userGuess;
    }

    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */

    public function number()
    {
        return $this->number;
    }

    /**
     * Get the guess.
     *
     * @return int as the guess
     */
    public function userGuess()
    {
        return $this->guess;
    }

    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    public function makeGuess(int $number)
    {
        // Make a guess
        $this->tries -= 1;
        $number = $this->number;
        $guess = $this->userGuess();
        // Cast $guess to int for the identical test to work
        if ((int)$guess === $number) {
            $this->res = "Correct!";
            $this->tries = 0;
        } elseif ($guess > $number) {
            $this->res = "Too high!";
        } else {
            $this->res = "Too low!";
        }
        return $this->res;
    }

    /**
     * Destroy the session to start a new game.
     *
     * @return void
     */
    public function destroySession()
    {
        // If it is desired to kill the session, also delete the session cookie.
        // **Note**: This will destory the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        header("Location: index.php");
    }
}
