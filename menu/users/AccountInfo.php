<?php
class AccountInfo
{
    //ACCOUNT DETAILS INFO
    public function accountInfoScreen($action)
    {
        $action = strtoupper($action);
        return "$action Dear user, your account info is given below:\n
        Name: John\n
        DoB: 1998-03-21";
    }
}
