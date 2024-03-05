<?php
session_start();

require_once('./business_logic/BusinessLogic.php');
require_once('./validation/Validation.php');
require_once('./menu/Commons.php');
require_once('./validation/Validation.php');
require_once('./menu/users/UserRegistration.php');
require_once('./menu/users/AccountInfo.php');

try {
    //GETTING THE REQUIRED DATA
    $msisdn = $_GET['msisdn'] ?? 1;
    $currentScreen = $_SESSION['screen'] ?? 1;
    $userInput = $_GET['text'] ?? 0;
    $session_id = $_GET['session_id'] ?? null;
    $businessLogic = new BusinessLogic();
    $validation = new Validation();

    if (isset($currentScreen)) {
        $_SESSION['screen'] = $currentScreen;
    }
    if (isset($session_id)) {
        $_SESSION['session_id'] = $session_id;
    }

    $data = $businessLogic->handleUserInput($userInput, $currentScreen);
    // echo json_encode($data);
    echo $validation->validateAge(23);
    echo '<br>';
    // if ($data['status'] == 'success') {
    $_SESSION['screen'] = $data['screen'] + 1;
    // };
    if ($_SESSION['screen'] == 6) {
        echo 'RESPONSE: ' . $data['response'] . '<br>USER NAME: ' .
            $_SESSION['USER_NAME'] . '<br>USER AGE: ' . $_SESSION['USER_AGE'];
    } else {
        echo 'RESPONSE: ' . $data['response'] . '<br>USER INPUT: ' .
            $data['input'] . '<br>CURRENT SCREEN: ' . $_SESSION['screen'];
    }
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . ' LINE NUMBER: ' . $th->getLine() . '</span>';
}

if ($data['destroy_session']) {
    session_destroy();
}