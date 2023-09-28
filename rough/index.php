<?php
//How to write content to a .txt file in PHP 
// $name = [30, 40, 50];

// $fp = fopen("output.php", "w");

// // Write the variable to the second PHP file
// fwrite($fp, "<?php \$name = \"$name\";");

// // Close the second PHP file
// fclose($fp);
// $name = "Tanzim";

// Write the variable to the second PHP file
// file_put_contents("output.php", "<?php \$name = \"$name\";");

// function checkFile(string $filename): string
// {
//     if (file_exists($filename)) {
//         return "File name exists";
//     }

//     return "File name does not exist";
// }

// echo fileExists("index.php");

// function readFileContents(string $filename): string
// {
//     if (checkFile($filename)) {
//         return file_get_contents($filename);
//     }
//     return "Files does not exist";
// }
//check whether file exists or not 
// echo checkFile("hello.txt");
//Read the text files 
// echo readFileContents("hello.txt");
function chunk(array $arr, int $size)
{
    for ($i = 0; $i < count($arr); $i += $size) {
        $chunk = array_slice($arr, $i, $size);
        $results[] = $chunk;
    }

    return $results;
}

echo chunk($arr, 3);
