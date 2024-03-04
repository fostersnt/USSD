<?php
// include('./functions.php');
require_once('./classes/Validation.php');
require_once('./menu/account_check.php');
require_once('./menu/account_register.php');
require_once('./api_calls/rapid_api.php');

try {
    //GETTING THE REQUIRED DATA
    $msisdn = $_GET['msisdn'] ?? null;
    $currentScreen = $_GET['screen'] ?? null;
    $userInput = $_GET['text'] ?? null;
    $session_id = $_GET['session_id'] ?? null;

    if (isset($currentScreen)) {
        $_SESSION['current_screen'] = $currentScreen;
    }
    if (isset($session_id)) {
        $_SESSION['session_id'] = $session_id;
    }
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . '</span>';
}
