<?php
require_once('./menu/Commons.php');
require_once('./classes/Validation.php');
require_once('./menu/users/UserRegistration.php');
require_once('./menu/users/AccountInfo.php');

class BusinessLogic
{
    //METHOD TO RETURN ERROR FEEDBACK
    public static function error_feedback(string $action, int $screen, $input, Commons $response)
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

        $responseScreens = new Commons();
        $userRegistration = new UserRegistration();
        $accountInfo = new AccountInfo();
        $validation = new Validation();

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
                            'response' => $userRegistration->userRegistrationScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input
                        ];
                        break;
                    case 2:
                        return [
                            'response' => $accountInfo->accountInfoScreen($terminate),
                            'screen' => $screen,
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
                        return [
                            'response' => $userRegistration->individualRegistrationScreen_Name($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input
                        ];
                        break;
                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                        break;
                }
            case 4:
                switch (true) {
                    case $validation->validateName($input):
                        return [
                            'response' => "Your name has successfully been taken",
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input
                        ];
                        break;

                    default:
                        return BusinessLogic::error_feedback($terminate, $screen, 'caty', $responseScreens);
                        break;
                }
            default:
                return BusinessLogic::error_feedback($terminate, $screen, $input, $responseScreens);
                break;
        }
    }
}
