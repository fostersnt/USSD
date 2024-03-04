<?php
require_once('./classes/Response.php');

class BusinessLogic
{
    //METHOD TO HANDLE USER INPUTS
    public function handleUserInput($input, $current_screen)
    {
        $continue = 'CON';
        $terminate = 'END';

        $responseScreens = new Response();

        switch ($input) {
            case 1:
                switch ($current_screen) {
                    case 1:
                        return $responseScreens->welcomeScreen($continue);
                        break;

                    default:
                        # code...
                        break;
                }
            case 2:
                switch ($current_screen) {
                    case 1:
                        return $responseScreens->welcomeScreen('CON');
                        break;

                    default:
                        # code...
                        break;
                }
            case 3:
                switch ($current_screen) {
                    case 1:
                        echo $responseScreens->welcomeScreen('CON');
                        break;

                    default:
                        # code...
                        break;
                }
            default:
                return $responseScreens->invalidInput($terminate);
                break;
        }
    }
}
