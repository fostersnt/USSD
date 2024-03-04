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
            'destroy_session' => true,
            'input' => $input
        ];
    }

    //METHOD TO HANDLE USER INPUTS
    public function handleUserInput($input = 0, $screen = 1)
    {
        $continue = 'CON';
        $terminate = 'END';

        $responseScreens = new Response();

        switch ($screen) {
            case 1:
                switch ($input) {
                    case 0:
                        return [
                            'response' => $responseScreens->welcomeScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input,
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 2:
                switch ($input) {
                    case 1:
                        return [
                            'response' => $responseScreens->userRegistrationScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input
                        ];
                        break;
                    case 2:
                        return [
                            'response' => $responseScreens->accountInfoScreen($terminate),
                            'screen' => 1,
                            'status' => 'success',
                            'destroy_session' => true,
                            'input' => $input
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 3:
                switch ($input) {
                    case 1:
                        return $responseScreens->individualRegistrationScreen_Name($continue);
                        break;

                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 3:
                switch ($input) {
                    case 1:
                        echo $responseScreens->welcomeScreen('CON');
                        break;

                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            default:
                return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                break;
        }
    }
}
