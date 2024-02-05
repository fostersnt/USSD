<?php

class Validations
{
    public static function sanitize_input($text)
    {
        $data = trim($text);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
