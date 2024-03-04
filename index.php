<?php
// include('./functions.php');
require_once('./classes/BusinessLogic.php');
require_once('./classes/Validation.php');
require_once('./menu/account_check.php');
require_once('./menu/account_register.php');
require_once('./api_calls/rapid_api.php');

try {
    //GETTING THE REQUIRED DATA
    $msisdn = $_GET['msisdn'] ?? '0';
    $currentScreen = $_GET['screen'] ?? '0';
    $userInput = $_GET['text'] ?? null;
    $session_id = $_GET['session_id'] ?? null;
    $businessLogic = new BusinessLogic();

    if (isset($currentScreen)) {
        $_SESSION['current_screen'] = $currentScreen;
    }
    if (isset($session_id)) {
        $_SESSION['session_id'] = $session_id;
    }

    $data = $businessLogic->handleUserInput($userInput, $currentScreen);

    if ($data['status'] == 'success') {
        $currentScreen = $data['screen'] + 1;
    };

    // $_SESSION['current_screen'] = $newScreen + 1;
    echo $data['response']; // . ' CURRENT SCREEN: ' . $currentScreen;
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . ' LINE NUMBER: ' . $th->getLine() . '</span>';
}
