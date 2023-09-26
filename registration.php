<?php
include 'getRandomString.php';
include 'RegsitrationFormValidation.php';
include 'Register.php';
$users = array(
    array('name' => 'john Doe', 'email' => 'john@example.com', 'password' => 'password123', 'balance' => 1000, 'accountId' => 'A1234'),
    array('name' => 'jane Smith', 'email' => 'jane@example.com', 'password' => 'secret321', 'balance' => 1500, 'accountId' => 'B5678'),
    array('name' => 'mike Johnson', 'email' => 'mike@example.com', 'password' => 'mikepass', 'balance' => 800, 'accountId' => 'C7890'),
    array('name' => 'nike Johnson', 'email' => 'mike@example.com', 'password' => 'nike123', 'balance' => 800, 'accountId' => 'D9876'),
    array('name' => 'nike Johnson', 'email' => 'tanzim@gmail.com', 'password' => 'tanzimpass', 'balance' => 800, 'accountId' => 'E4321')
);





$inputemail = "tanzim21@gmail.com";
$name = "Tanzim Ib";
$password = "12345678";
$balance = 0;
$accountId = getRandomString(6);
var_dump($accountId);
if (empty($users)) {
    //Instantiate an array 


    register(
        inputemail: $inputemail,
        name: $name,
        password: $password,
        balance: $balance,
        accountId: $accountId,
        users: $users
    );



    RegisterFormValidation(inputemail: $inputemail, password: $password, name: $name);
} else {
    $all_email = array_column($users, 'email');

    if (in_array($inputemail, $all_email)) {
        echo "The email already exists";
    }
    if (!in_array($inputemail, $all_email)) {
        register(
            inputemail: $inputemail,
            name: $name,
            password: $password,
            balance: $balance,
            accountId: $accountId,
            users: $users
        );
        RegisterFormValidation(inputemail: $inputemail, password: $password, name: $name);
    }
}
