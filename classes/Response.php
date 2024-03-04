<?php

class Response
{
    public function welcomeScreen($action)
    {
        $action = strtoupper($action);
        return "$action Hello, you are welcome to this USSD screen.Select an option to proceed\n
        1. Request Transaction Details\n
        2. View Personal info";
    }

    public function userRegistrationScreen($action)
    {
        $action = strtoupper($action);
        return "$action Select registration type to continue\n
        1. Individual registration\n
        2. Group registration";
    }

    public function individualRegistrationScreen_Name($action)
    {
        $action = strtoupper($action);
        return "$action Enter your name:";
    }

    public function individualRegistrationScreen_Age($action)
    {
        $action = strtoupper($action);
        return "$action Enter your age:";
    }

    public function invalidInput($action)
    {
        return "$action Sorry, the value you entered does fall within the options provided.";
    }
}
