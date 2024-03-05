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
    $text = $_GET['text'];
    $current_page = $_SESSION['current_screen'] = null;

    if ($current_page) {
        switch ($selectedOption) {
            case 1:
                $_SESSION['current_screen'] = 'user_registration';
                // Display the second screen options for User Registration
                // Provide options for Individual and Group registration
                break;
            case 2:
                // User selected User Account Info
                // Implement logic for User Account Info
                break;
            default:
                // Handle other cases or invalid input
        }
    }
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . ' LINE NUMBER: ' . $th->getLine() . '</span>';
}

if ($data['destroy_session']) {
    session_destroy();
}