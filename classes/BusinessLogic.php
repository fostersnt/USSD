<?php
require_once('./classes/Response.php');

class BusinessLogic
{
    public static function error_feedback(string $action, int $screen, Response $response)
    {
        return [
            'response' => $response->invalidInput($action),
            'screen' => $screen,
            'status' => 'failed'
        ];
    }
    //METHOD TO HANDLE USER INPUTS
    public function handleUserInput($input, $current_screen)
    {
        $continue = 'CON';
        $terminate = 'END';

        $responseScreens = new Response();

        switch ($input) {
            case 0:
                switch ($current_screen) {
                    case 0:
                        return [
                            'response' => $responseScreens->welcomeScreen($continue),
                            'screen' => $current_screen,
                            'status' => 'success'
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $current_screen, $responseScreens);
                        break;
                }
            case 1:
                switch ($current_screen) {
                    case 1:
                        return [
                            'response' => $responseScreens->userRegistrationScreen($continue),
                            'screen' => $current_screen,
                            'status' => 'success'
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $current_screen, $responseScreens);
                        break;
                }
            case 2:
                switch ($current_screen) {
                    case 1:
                        return $responseScreens->welcomeScreen('CON');
                        break;

                    default:
                        return BusinessLogic::error_feedback($terminate, $current_screen, $responseScreens);
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
                return BusinessLogic::error_feedback($terminate, $current_screen, $responseScreens);
                break;
        }
    }
}
