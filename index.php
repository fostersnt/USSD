<?php
session_start();
// session_destroy();

// require_once('./business_logic/BusinessLogic.php');
require_once('./validation/Validation.php');
require_once('./menu/Commons.php');
require_once('./validation/Validation.php');
require_once('./menu/users/UserRegistration.php');
require_once('./menu/users/AccountInfo.php');
require_once('./queries/User.php');

try {
    $text = $_GET['text'] ?? null;
    $continue = 'CON';
    $terminate = 'END';

    //INSTANCES/OBJECTS
    $commons = new Commons();
    $userRegistration = new UserRegistration();
    $accountInfo = new AccountInfo();

    $message_response = '';

    if ($text == null) {
        $_SESSION['current_screen'] = 1;
        $message_response = $commons->welcomeScreen($continue);
    }
    elseif ($_SESSION['current_screen'] == 1 && $text == "1") {
        $message_response = $userRegistration->userRegistrationScreen($continue);
        $_SESSION['current_screen'] = 2;
    }
    //INDIVIDUAL REGISTRATION BEGINS HERE
    elseif ($_SESSION['current_screen'] == 2 && $text == "1") {
        $message_response = $userRegistration->individualRegistrationScreen_Name($continue);
        $_SESSION['current_screen'] = 3;
        $_SESSION['key'] = "user_name";
    }
    elseif ($_SESSION['current_screen'] == 3 && $_SESSION['key'] == "user_name") {
        $_SESSION['name'] = $text;
        $_SESSION['key'] = "user_pin";
        $message_response = $userRegistration->individualRegistrationScreen_Pin($terminate);
        $_SESSION['current_screen'] = 4;
    }
    elseif ($_SESSION['current_screen'] == 4 && $_SESSION['key'] == "user_pin") {
        $_SESSION['pin'] = $text;
        $message_response = "$terminate Individual registration completed";
        $_SESSION['current_screen'] = 4;
    }
    //GROUP REGISTRATION BEGINS HERE
} catch (\Throwable $th) {
    $message_response = "END UNKNWON ERROR";
}

header('Content-type: text/plain');

echo $message_response;
echo "\nCURRENT SCREEN: " . $_SESSION['current_screen'] . "\nUSER INPUT: " . $text;

// After session_start(), add debugging statements
echo "\n\nDEBUG: " . print_r($_SESSION, true) . "\n";
