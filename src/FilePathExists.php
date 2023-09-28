<?php

declare(strict_types=1);

namespace App;

trait FilePathExists
{
    public function filePathExists(string $phpFilePath, array $array): void
    {
        // Check if the PHP file already exists
        if (file_exists($phpFilePath)) {
            // Include the existing PHP file to access its data
            include $phpFilePath;
            $this->array = $array;
        }
    }
}
