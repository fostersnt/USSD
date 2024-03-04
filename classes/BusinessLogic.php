<?php
require_once('./menu/Commons.php');
require_once('./classes/Validation.php');
require_once('./menu/users/UserRegistration.php');
require_once('./menu/users/AccountInfo.php');

class BusinessLogic
{
    //METHOD TO HANDLE USER INPUTS
    public function handleUserInput($input = 0, $screen = 1)
    {
        $continue = 'CON';
        $terminate = 'END';

        $commons = new Commons();
        $userRegistration = new UserRegistration();
        $accountInfo = new AccountInfo();
        $validation = new Validation();

        switch ($screen) {
            case 1:
                switch ($input) {
                    case 0:
                        return [
                            'response' => $commons->welcomeScreen($continue),
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input,
                        ];
                        break;
                    default:
                        return $commons->invalidInput($terminate, $screen, $input);
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
                        return $commons->invalidInput($terminate, $screen, $input);
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
                        return $commons->invalidInput($terminate, $screen, $input);
                        break;
                }
            case 4:
                switch (true) {
                    case $validation->validateName($input):
                        $_SESSION['USERNAME'] = $input;
                        return [
                            'response' => $userRegistration->individualRegistrationScreen_Age($input),
                            'screen' => $screen,
                            'status' => 'success',
                            'destroy_session' => false,
                            'input' => $input
                        ];
                        break;

                    default:
                        return $commons->invalidInput($terminate, $screen, $input, "Invalid user name");
                        break;
                }
            case 5:
                switch (true) {
                    case $validation->validateAge($input):
                        $_SESSION['USERAGE'] = $input;
                        return $commons->successMessage($terminate, $screen, $input, "User registered successfully");
                        break;

                    default:
                        return $commons->invalidInput($terminate, $screen, $input, "Invalid Age");
                        break;
                }
            default:
                return $commons->invalidInput($terminate, $screen, $input, "Error occurred");
                break;
        }
    }
}