<?php

class Commons
{
    public function welcomeScreen($action)
    {
        $action = strtoupper($action);
        return "$action Welcom to GWO SEVO USSD,\nSelect an option to proceed\n
        1. User Registration\n
        2. View Account Details";
    }



    public function invalidInput($action)
    {
        return "$action Invalid input provided.";
    }
}
