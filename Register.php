<?php


function register($inputemail, $name, $password, $balance, $accountId, $users)
{
    if (filter_var($inputemail, FILTER_VALIDATE_EMAIL) && strlen($name) >= 8 && strlen($password) >= 8) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $values = [$name, $inputemail, $hashed_password, $balance, $accountId];
        $keys = ['name', 'email', 'password', 'balance', 'accountId'];
        $array_combine = array_combine($keys, $values);
        // var_dump($array_combine);
        array_push($users, $array_combine);
        var_dump($users);
    }
}
