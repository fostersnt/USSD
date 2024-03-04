<?php
session_start();
require_once('./classes/BusinessLogic.php');
require_once('./classes/Validation.php');

try {
    //GETTING THE REQUIRED DATA
    // $_SESSION['screen'] = 1;
    $msisdn = $_GET['msisdn'] ?? 1;
    $currentScreen = $_SESSION['screen'] ?? 1;
    $userInput = $_GET['text'] ?? 0;
    $session_id = $_GET['session_id'] ?? null;
    $businessLogic = new BusinessLogic();

    if (isset($currentScreen)) {
        $_SESSION['screen'] = $currentScreen;
    }
    if (isset($session_id)) {
        $_SESSION['session_id'] = $session_id;
    }

    $data = $businessLogic->handleUserInput($userInput, $currentScreen);
    echo json_encode($data);
    echo '<br>';
    if ($data['status'] == 'success') {
        $_SESSION['screen'] = $data['screen'] + 1;
    };

    echo 'RESPONSE: ' . $data['response'] . '<br>USER INPUT: ' .
        $data['input'] . '<br>CURRENT SCREEN: ' . $_SESSION['screen'];
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . ' LINE NUMBER: ' . $th->getLine() . '</span>';
}

if ($data['destroy_session']) {
    session_destroy();
}
