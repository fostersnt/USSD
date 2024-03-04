<?php

class Response
{
    public function welcomeScreen($action)
    {
        $action = strtoupper($action);
        return "$action Welcom to GWO SEVO USSD,\nSelect an option to proceed\n
        1. User Registration\n
        2. View Account Details";
    }

    //USER REGISTRATION
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

    public function groupRegistrationScreen_Name($action)
    {
        $action = strtoupper($action);
        return "$action Enter group name:";
    }

    public function groupRegistrationScreen_Age($action)
    {
        $action = strtoupper($action);
        return "$action Enter group average age:";
    }

    //ACCOUNT DETAILS INFO
    public function accountInfoScreen($action)
    {
        $action = strtoupper($action);
        return "$action Dear user, your account info is given below:\n
        Name: John\n
        DoB: 1998-03-21";
    }

    public function invalidInput($action)
    {
        return "$action Invalid input provided.";
    }
}
