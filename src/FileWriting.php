<?php

declare(strict_types=1);

namespace App;

trait FileWriting
{
    public static function write(array $array, $file, string $filePath, string $variableName)
    {
        $file = fopen($filePath, "w");

        if ($file) {
            // Write the updated categories associative array to the PHP file
            if ($variableName == "users") {
                fwrite($file, "<?php\n\$users= " . var_export($array, true) . ";\n?>");

                // Close the PHP file
                fclose($file);
            }

            if ($variableName == "transactions") {
                fwrite($file, "<?php\n\$transactions= " . var_export($array, true) . ";\n?>");

                // Close the PHP file
                fclose($file);
            }


            echo "Data has been updated in $filePath." . PHP_EOL;
        } else {
            echo "Failed to open the PHP file for writing." . PHP_EOL;
        }
    }
}
