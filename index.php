<?php
session_start();

// include('./functions.php');
require_once('./classes/BusinessLogic.php');
require_once('./classes/Validation.php');
require_once('./menu/account_check.php');
require_once('./menu/account_register.php');
require_once('./api_calls/rapid_api.php');

try {
    //GETTING THE REQUIRED DATA
    $msisdn = $_GET['msisdn'] ?? 1;
    $currentScreen = $_SESSION['screen'] ?? 1;
    $userInput = $_GET['text'] ?? null;
    $session_id = $_GET['session_id'] ?? null;
    $businessLogic = new BusinessLogic();

    if (isset($currentScreen)) {
        $_SESSION['screen'] = $currentScreen;
    }
    if (isset($session_id)) {
        $_SESSION['session_id'] = $session_id;
    }

    $data = $businessLogic->handleUserInput($userInput, $currentScreen);

    if ($data['status'] == 'success') {
        $_SESSION['screen'] = $data['screen'] + 1;
        // $_SESSION['screen'] = $_SESSION['screen'] != 1 ? $data['screen'] + 1 : $data['screen'];
    };

    // $_SESSION['current_screen'] = $newScreen + 1;
    echo 'RESPONSE: ' . $data['response'] . '<br>USER INPUT: ' .
        $data['input'] . '<br>CURRENT SCREEN: ' . $_SESSION['screen'];
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . ' LINE NUMBER: ' . $th->getLine() . '</span>';
}

// session_destroy();