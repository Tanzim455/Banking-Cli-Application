<?php
echo "Menu:\n";
echo "1. Login\n";
echo "2. Register\n";
echo "3. Exit\n";
$phpFilePath = 'output.php';
if (file_exists($phpFilePath)) {
    // Include the existing PHP file to access its data
    include $phpFilePath;
}
while (true) {
    $readline = readline("Select an option: ");
    if ($readline == 1) {
        echo "Login";
    }
    if ($readline == 2) {
        // var_dump($users);
        echo "Enter your email \n";
        $email = trim(fgets(STDIN));
        $all_users_email = array_column($users, 'email');


        echo "Enter your password \n";
        $password = trim(fgets(STDIN));
        echo "Enter your name \n";
        $name = trim(fgets(STDIN));
        echo "Enter your balance \n";
        $balance = floatval(trim(fgets(STDIN)));
        if (in_array($email, $all_users_email)) {
            echo "This email already exists";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "It is not an appropriate email address" . PHP_EOL;
        }

        if (strlen($password) < 8) {
            echo "Your password count needs to be greater or equal to 8" . PHP_EOL;
        }

        if (strlen($name) < 8) {
            echo "Your name must be at least 8 characters" . PHP_EOL;
        }
        if ($balance < 0) {
            echo "Your balance cannot be negative";
        }

        if (
            filter_var($email, FILTER_VALIDATE_EMAIL) && !in_array($email, $all_users_email) && strlen($name) >= 8 && strlen($password) >= 8
            && $balance > 0
        ) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $values = [$name, $email, $hashed_password, $balance];
            $keys = ['name', 'email', 'password', 'balance'];
            $array_combine = array_combine($keys, $values);
            if (!isset($users)) {
                $users = [];
            }
            array_push($users, $array_combine);
            $file = fopen($phpFilePath, "w");

            if ($file) {
                // Write the updated categories associative array to the PHP file
                fwrite($file, "<?php\n\$users= " . var_export($users, true) . ";\n?>");

                // Close the PHP file
                fclose($file);

                echo "Data has been updated in $phpFilePath." . PHP_EOL;
            } else {
                echo "Failed to open the PHP file for writing." . PHP_EOL;
            }
        }
    }
    if ($readline == 3) {
        exit();
    }
    if ($readline == 4) {
        var_dump($users);
    }
}
