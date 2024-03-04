<?php

class UserRegistration
{
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
}