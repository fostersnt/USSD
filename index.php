<?php
include('./functions.php');
include('./secrets.php');
include('./menu/account_check.php');
include('./menu/account_register.php');

$app_secrets = getSecrets();
$accounts_page_1 = page_1();

$code = "419";

switch ($code) {
    case '123':
        echo printName("Foster Amponsah Asante");
        break;
    case '419':
        echo $app_secrets["apiKey"];
        break;
    case '41':
        echo $accounts_page_1;
        break;
    default:
        echo "Your input couldn't match any item";
        break;
}

