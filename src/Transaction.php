<?php

declare(strict_types=1);

namespace App;

class Transaction
{
    use FileWriting;
    public function transactionKeyValues(
        string $to,
        string $type,
        float $amount,
        array $array,
        $file,
        string $transactionFilePath
    ): void {
        $transaction_keys = ['to', 'type', 'amount'];
        $transaction_values = [$to, $type, $amount];
        $transaction_array_combine = array_combine($transaction_keys, $transaction_values);
        array_push($array, $transaction_array_combine);

        $this->write(array: $array, file: $file, filePath: $transactionFilePath, variableName: "transactions");
    }

    public function amountBalanceValidation(float $balance, float $amount): void
    {
        if ($amount > $balance) {
            echo "Sorry the amount is greater than your balance";
        }
        if ($amount < 0) {
            echo "Sorry The amount is a negative number";
        }
    }
    function addorDeductBalance(
        array $array,
        string $email,
        string $type,
        float $amount,
        $file,
        string $userFilePath
    ): void {
        $filtered_email = array_filter($array, fn ($u) => $u['email'] == $email);



        //Get array keys 
        $array_key_index = array_keys($filtered_email)[0];



        if ($type == "WithDraw") {
            $array[$array_key_index]['balance'] -= $amount;
        }
        if ($type == "Deposit") {
            $array[$array_key_index]['balance'] += $amount;
        }
        $this->write(array: $array, file: $file, filePath: $userFilePath, variableName: "users");
    }
}
