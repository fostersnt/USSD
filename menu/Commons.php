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

    public function successMessage(string $action, int $screen, $input, $message)
    {
        return [
            'response' => "$action $message",
            'screen' => $screen,
            'status' => 'failed',
            'destroy_session' => true,
            'input' => $input
        ];
    }

    public function invalidInput(string $action, int $screen, $input, $message = "Imvalid input")
    {
        return [
            'response' => "$action $message",
            'screen' => $screen,
            'status' => 'failed',
            'destroy_session' => true,
            'input' => $input
        ];
    }
}