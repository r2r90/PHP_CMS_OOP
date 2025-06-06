<?php

class Auth
{
    public function checkLogin($username, $password)
    {
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        $userObj = new User($dbc);
        $userObj->findBy('username', $username);


        if (property_exists($userObj, 'id')) {

            if (password_verify($password, $userObj->password)) {
                return true;
            }
        }
    }

    public function changeUserPassword($userObj, $newPassword)
    {
        /* $tmp = date('YmdHis') . 'secret-string1398392';
         $hash = md5($tmp);
         $hashedPassword = md5($newPassword . ENCRYPTION_SALT . $hash);*/
        $userObj->password = password_hash($newPassword, PASSWORD_DEFAULT);
        return $userObj;
    }
}