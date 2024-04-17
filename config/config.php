<?php

//host
$host = 'localhost';

//user
$user = 'root';

//password
$pass = '';

//database
$dbname = 'bookstore';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//if ($conn) {
//    echo 'connected';
//} else {
//    echo 'not connected';
//}