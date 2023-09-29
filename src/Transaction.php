<?php

declare(strict_types=1);

namespace App;

class Transaction
{
    use FileWriting;
    public function transactionKeyValues(
        string $to,
        string $type,
        int $amount,
        array $array,
        $file,
        string $transactionFilePath
    ): void {
        $transaction_keys = ['to', 'type', 'amount'];
        $transaction_values = [$to, $type, $amount];
        $transaction_array_combine = array_combine($transaction_keys, $transaction_values);
        array_push($array, $transaction_array_combine);
        $this->write(array: $array, file: $file, filePath: $transactionFilePath);
    }
}
