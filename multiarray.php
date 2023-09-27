<?php
// $users = [
//     [
//         'name' => 'john Doe',
//         'email' => 'john21@example.com',
//         'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce',
//         'balance' => 1000,

//     ],
//     [
//         'name' => 'john Doe',
//         'email' => 'john25@example.com',
//         'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce', 'balance' => 1000,

//     ],
//     [
//         'name' => 'john Doe',
//         'email' => 'john22@example.com',
//         'password' => '$2y$10$rffG3LTkPt.dJlfJb.oj6OVVUvyVWZqiLV5R47pKXA/felpB1.Kce',
//         'balance' => 1000,
//     ]
// ];
// $authuseremail = "john22@example.com";
// $amount = 45;
// $calculatetype = '-';
function addOrDeductBalance(&$array): array
{
    global $authuseremail;
    global $amount;
    global $calculatetype;
    foreach ($array as $key => &$value) {
        if (is_array($value)) {
            addOrDeductBalance($value);
        }

        if ($key == 'email' && $value == $authuseremail) {
            // echo $key." = ".$value."<br />\n";
            if ($calculatetype == '+') {
                $array['balance'] += $amount;
                break;
            }
            if ($calculatetype == '-') {
                $array['balance'] -= $amount;
                break;
            }
        }
    }

    return $array;
}
// var_dump(addOrDeductBalance($users));
