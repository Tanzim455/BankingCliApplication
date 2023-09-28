<?php

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
function addBalancetoDepositor(&$array): array
{
    global $to;
    global $amount;

    foreach ($array as $key => &$value) {
        if (is_array($value)) {
            addBalancetoDepositor($value);
        }

        if ($key == 'email' && $value == $to) {
            // echo $key." = ".$value."<br />\n";

            $array['balance'] += $amount;
            break;
        }
    }

    return $array;
}
// var_dump(addOrDeductBalance($users));
