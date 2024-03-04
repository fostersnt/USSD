<?php
// include('./functions.php');
// include('./secrets.php');
include('./menu/account_check.php');
include('./menu/account_register.php');
include('./api_calls/rapid_api.php');

try {
    //GETTING THE REQUIRED DATA
    $msisdn = $_GET['msisdn'] ?? null;
    $currentPage = $_GET['currentPage'] ?? null;
    $userInput = $_GET['userInput'] ?? null;
    $session_id = $_GET['session_id'] ?? null;

    // $app_secrets = getSecrets();
    $accounts_page_1 = page_1();

    $code = "419";

    switch ($code) {
        case '123':
            echo printName("Foster Amponsah Asante");
            break;
        case '419':
            // echo $app_secrets["rapidAPI"]['X-RapidAPI-Key'];
            echo $msisdn;
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
