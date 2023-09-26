<?php

declare(strict_types=1);
include 'login.php';
include 'transactions.php';
$users = array(
    array(
        'name' => 'john Doe', 'email' => 'john@example.com',
        'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce', 'balance' => 1000, 'accountId' => 'A1234'
    ),
    array('name' => 'jane Smith', 'email' => 'jane@example.com', 'password' => 'secret321', 'balance' => 1500, 'accountId' => 'B5678'),
    array('name' => 'mike Johnson', 'email' => 'mike@example.com', 'password' => 'mikepass', 'balance' => 800, 'accountId' => 'C7890'),
    array('name' => 'nike Johnson', 'email' => 'mike@example.com', 'password' => 'nike123', 'balance' => 800, 'accountId' => 'D9876'),
    array('name' => 'nike Johnson', 'email' => 'tanzim@gmail.com', 'password' => 'tanzimpass', 'balance' => 800, 'accountId' => 'E4321')
);


// echo password_hash("password123", PASSWORD_DEFAULT);
// echo password_hash("secret321", PASSWORD_DEFAULT);
$loginemail = "john@example.com";
$inputpassword = "secret321";


//Destructure and getting filtered email 

function filterEmail(array $array, string $email, string $filterBy): array
{
    return  array_filter($array, fn ($u) => $u[$filterBy] == $email);
}

$filtered_email = filterEmail(array: $users, email: $loginemail, filterBy: 'email');

// var_dump($filtered_email);
$result = login(filtered_email: $filtered_email, inputpassword: $inputpassword);
['email' => $authuseremail] = $filtered_email[0];
$balance = viewBalance(filtered_email: $filtered_email);

$option = "Transactions";
if ($result) {

    if ($option == "ViewBalance") {
        echo "Your balance is $balance";
    }
    if ($option == "Transactions") {

        $filtered_email_by_transactions = filterEmail(array: $transactions, email: $authuseremail, filterBy: 'from');


        foreach ($filtered_email_by_transactions as $transaction) {
            $from = $transaction['from'];
            $to = $transaction['to'];
            $amount = $transaction['amount'];

            echo "To: " . $from . "\n";
            echo "Type: " . $to . "\n";
            echo "Balance: $" . $amount . "\n\n";
        }
    }
}
