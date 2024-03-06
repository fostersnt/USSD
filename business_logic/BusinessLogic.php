<?php
class BusinessLogic
{
    // //METHOD TO HANDLE USER INPUTS
    // public function handleUserInput($input = 0, $initialScreen = 1, $mainScreen, $subScreen)
    // {
    //     // session_start();

    //     $continue = 'CON';
    //     $terminate = 'END';

    //     $commons = new Commons();
    //     $userRegistration = new UserRegistration();
    //     $accountInfo = new AccountInfo();
    //     $validation = new Validation();

    //     switch ($initialScreen) {
    //         case 1:
    //             switch ($input) {
    //                 case null: //User just dialed the ussd code
    //                     return [
    //                         'response' => $commons->welcomeScreen($continue),
    //                         'initial_screen' => $initialScreen,
    //                         'status' => 'success',
    //                         'destroy_session' => false,
    //                         'input' => $input,
    //                     ];
    //                     break;
    //                 case 1: //User selects option 1 on the first page
    //                     return [
    //                         'response' => $userRegistration->userRegistrationScreen($continue),
    //                         'initial_screen' => $initialScreen,
    //                         'status' => 'success',
    //                         'destroy_session' => false,
    //                         'input' => $input,
    //                     ];
    //                     break;
    //                 case 2: //User selects option 2 on the first page
    //                     return [
    //                         'response' => $accountInfo->accountInfoScreen($continue),
    //                         'initial_screen' => $initialScreen,
    //                         'status' => 'success',
    //                         'destroy_session' => false,
    //                         'input' => $input,
    //                     ];
    //                     break;
    //                     //OPTIONS END HERE BECAUSE THERE ARE ONLY TWO ON THE MAIN PAGE
    //                 default:
    //                     return $commons->invalidInput($terminate, $initialScreen, $input);
    //                     break;
    //             }
    //         case 2:
    //             switch ($_SESSION['main_screen']) {
    //                 case 'user_registration':
    //                     switch ($input) {
    //                         case 1:
    //                             return [
    //                                 'response' => $userRegistration->individualRegistrationScreen_Name($continue),
    //                                 'initial_screen' => $initialScreen,
    //                                 'status' => 'success',
    //                                 'destroy_session' => false,
    //                                 'input' => $input,
    //                             ];
    //                             break;
    //                         case 2:
    //                             return [
    //                                 'response' => $userRegistration->individualRegistrationScreen_Name($continue),
    //                                 'initial_screen' => $initialScreen,
    //                                 'status' => 'success',
    //                                 'destroy_session' => false,
    //                                 'input' => $input,
    //                             ];
    //                             break;
    //                         default:

    //                             break;
    //                     }
    //                     break;
    //                 default:
    //                     # code...
    //                     break;
    //             }
    //             break;
    //         default:
    //             return $commons->invalidInput($terminate, $initialScreen, $input, "Error occurred");
    //             break;
    //     }
    // }
}