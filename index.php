<?php
session_start();

require_once('./business_logic/BusinessLogic.php');
require_once('./validation/Validation.php');
require_once('./menu/Commons.php');
require_once('./validation/Validation.php');
require_once('./menu/users/UserRegistration.php');
require_once('./menu/users/AccountInfo.php');
require_once('./queries/User.php');

try {
    $text = $_GET['text'] ?? null;
    $_SESSION['current_screen'] = null;

    $continue = 'CON';
    $terminate = 'END';

    //INSTANCES/OBJECTS
    $commons = new Commons();
    $userRegistration = new UserRegistration();
    $accountInfo = new AccountInfo();
    $screens = [
        'user_registration',
        'individual_registration',
        'user_name',
        'user_pin',
        'group_registration',
        'account_info'
    ];

    $message_response = '';

    if ($_SESSION['current_screen'] == null) {
        switch ($text) {
            case null:
                $message_response = $commons->welcomeScreen($continue);
                break;
            case 1:
                $_SESSION['current_screen'] = $screens[0];
                $message_response = $userRegistration->userRegistrationScreen($continue);
                break;
            case 2:
                $_SESSION['current_screen'] = $screens[5];
                $message_response = $accountInfo->accountInfoScreen($terminate);
                break;
            default:
                $message_response = $commons->generalResponse($terminate, "Invalid input");
        }
        // echo $message_response;
        // echo '<br>CURRENT SCREEN: ' . $_SESSION['current_screen'] . "<br>USER INPUT: " . $text . "<br>";
    }
    if ($_SESSION['current_screen'] == $screens[0]) {
        switch ($text) {
            case 1:
                $_SESSION['current_screen'] = $screens[1];
                $message_response = $userRegistration->userRegistrationScreen($continue);
                break;
            case 2:
                $_SESSION['current_screen'] = $screens[1];
                $message_response = $userRegistration->individualRegistrationScreen_Name($continue);
                break;
            default:
                $message_response = $commons->generalResponse($terminate, "Invalid input");
                break;
        }
        // echo $message_response;
        // echo '<br>CURRENT SCREEN: ' . $_SESSION['current_screen'] . "<br>USER INPUT: " . $text . "<br>";
    }
    echo $message_response;
    echo '<br>CURRENT SCREEN: ' . $_SESSION['current_screen'] . "<br>USER INPUT: " . $text . "<br>";
} catch (\Throwable $th) {
    // echo '<span style="color: red;">' . $th->getMessage() . ' LINE NUMBER: ' . $th->getLine() . '</span>';
}

if ('vv') {
    session_destroy();
}