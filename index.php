<?php
// include('./functions.php');
require_once('./classes/Response.php');
require_once('./menu/account_check.php');
require_once('./menu/account_register.php');
require_once('./api_calls/rapid_api.php');

try {
    //GETTING THE REQUIRED DATA
    $msisdn = $_GET['msisdn'] ?? null;
    $currentPage = $_GET['currentPage'] ?? null;
    $userInput = $_GET['userInput'] ?? null;
    $session_id = $_GET['session_id'] ?? null;

    $responseScreens = new Response();

    // $app_secrets = getSecrets();
    $accounts_page_1 = page_1();

    $code = "419";

    switch ($code) {
        case '123':
            echo printName("Foster Amponsah Asante");
            break;
        case '419':
            // echo $app_secrets["rapidAPI"]['X-RapidAPI-Key'];
            echo $responseScreens->welcomeScreen('CON');
            break;
        case '41':
            echo $accounts_page_1;
            break;
        default:
            echo "Your input couldn't match any item";
            break;
    }
} catch (\Throwable $th) {
    echo '<span style="color: red;">' . $th->getMessage() . '</span>';
}
