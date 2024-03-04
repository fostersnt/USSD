<?php
require_once('./classes/Response.php');

class BusinessLogic
{
    //METHOD TO RETURN ERROR FEEDBACK
    public static function error_feedback(string $action, int $screen, $input, Response $response)
    {
        return [
            'response' => $response->invalidInput($action),
            'screen' => $screen,
            'status' => 'failed',
            'input' => $input
        ];
    }

    //METHOD TO HANDLE USER INPUTS
    public function handleUserInput($input, $screen)
    {
        $continue = 'CON';
        $terminate = 'END';

        $responseScreens = new Response();

        switch ($input) {
            case 0:
                switch ($screen) {
                    case 0:
                        return [
                            'response' => $responseScreens->welcomeScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'input' => $input
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 1:
                switch ($screen) {
                    case 1:
                        return [
                            'response' => $responseScreens->userRegistrationScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'input' => $input
                        ];
                        break;
                    case 2:
                        return [
                            'response' => $responseScreens->userRegistrationScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'input' => $input
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 2:
                switch ($screen) {
                    case 1:
                        return $responseScreens->welcomeScreen('CON');
                        break;

                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 3:
                switch ($screen) {
                    case 1:
                        echo $responseScreens->welcomeScreen('CON');
                        break;

                    default:
                        # code...
                        break;
                }
            default:
                return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                break;
        }
    }
}
