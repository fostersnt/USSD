<?php
class Session {
    public static function start() {
        session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public static function destroy() {
        session_destroy();
    }

    public static function proceed_ussd($text)
    {
        return "CON" . $text;
    }

    public static function stop_ussd($text)
    {
        return "END" . $text;
    }
}
