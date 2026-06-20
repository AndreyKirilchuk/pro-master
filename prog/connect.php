<?php

$host = 'localhost';
$dbname = 'pro-master';
$login = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$dbname";

try{
    $connect = new PDO ($dsn,$login,$pass);
}catch(PDOException $error){
    echo $error;
}