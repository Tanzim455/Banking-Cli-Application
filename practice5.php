<?php

declare(strict_types=1);
include 'login.php';
include 'transactions.php';
include 'multiarray.php';


// echo password_hash("password123", PASSWORD_DEFAULT);
// echo password_hash("secret321", PASSWORD_DEFAULT);
// $loginemail = 'john21@example.com';
$inputpassword = "secret321";
$inputemail = 'john21@example.com';


function filterEmail(array $array, string $email, string $filterBy): array
{

    return array_filter($array, fn ($u) => $u[$filterBy] == $email);
}

function transactionKeyValues(string $to, string $type, int $amount, array $array): void
{
    $transaction_keys = ['to', 'type', 'amount'];
    $transaction_values = [$to, $type, $amount];
    $transaction_array_combine = array_combine($transaction_keys, $transaction_values);
    array_push($array, $transaction_array_combine);
    var_dump($array);
}


if (isset($users) && count($users) > 0) {
    $filtered_email = filterEmail(array: $users, email: $inputemail, filterBy: 'email');
    if (!$filtered_email) {
        echo "You are not registered here please join before login";
    }
    $result = login(filtered_email: $filtered_email, inputpassword: $inputpassword);
    ['email' => $authuseremail] = $filtered_email[0];
    $balance = viewBalance(filtered_email: $filtered_email);

    $option = "Deposit";
    if ($result) {

        if ($option == "ViewBalance") {
            echo "Your balance is $balance";
        }
        if ($option == "Transactions") {

            if (!isset($transactions)) {
                echo "There are no transactions here";
            }

            if (isset($transactions) && count($transactions) > 0) {
                $filtered_email_by_transactions =
                    filterEmail(array: $transactions, email: $authuseremail, filterBy: 'from');
                if ($filtered_email_by_transactions) {
                    foreach ($filtered_email_by_transactions as $transaction) {
                        $from = $transaction['from'];
                        $to = $transaction['to'];
                        $amount = $transaction['amount'];


                        echo "To: " . $to . "\n";
                        echo "Balance: $" . $amount . "\n\n";
                    }
                }

                if (!$filtered_email_by_transactions) {
                    echo "You dont have any transactions here";
                }
            }
        }
        if ($option == "Withdraw") {

            if (!isset($transactions)) {
                $transactions = [];
            }
            // var_dump($transactions);


            $type = "Withdraw";
            $to = $authuseremail;
            $amount = 500;
            transactionKeyValues(array: $transactions, to: $to, type: $type, amount: $amount);
            if ($amount > $balance) {
                echo "The amount is greater than balance";
            }
            if ($amount < 0) {
                echo "The amount cannot be negative";
            }

            if ($amount < $balance) {
                $calculatetype = '-';
                var_dump(addOrDeductBalance(array: $users));
            }
        }
        if ($option == "Deposit") {

            if (!isset($transactions)) {
                $transactions = [];
            }
            // var_dump($transactions);


            $type = "Deposit";
            $to = $authuseremail;
            $amount = 5000;
            transactionKeyValues(array: $transactions, to: $to, type: $type, amount: $amount);
            if ($amount < 0) {
                echo "The amount cannot be negative";
            }

            if ($amount > 0) {
                $calculatetype = '+';
                var_dump(addOrDeductBalance(array: $users));
            }
        }
    }
}

if (!isset($users)) {
    echo "You are not registered here please register before login";
}
