<?php

declare(strict_types=1);

namespace App;

trait FileWriting
{
    public static function write(array $array, $file, string $phpFilePath)
    {
        $file = fopen($phpFilePath, "w");

        if ($file) {
            // Write the updated categories associative array to the PHP file
            fwrite($file, "<?php\n\$users= " . var_export($array, true) . ";\n?>");

            // Close the PHP file
            fclose($file);

            echo "Data has been updated in $phpFilePath." . PHP_EOL;
        } else {
            echo "Failed to open the PHP file for writing." . PHP_EOL;
        }
    }
}
