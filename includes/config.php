<?php
session_start();

/*
 * Connection to database
 */

$hostname      = 'localhost';
$username      = 'root';
$password      = '';
$databaseName  = 'php_starter_kit';

$con = mysqli_connect($hostname, $username, $password, $databaseName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

require_once 'initialize.php';
