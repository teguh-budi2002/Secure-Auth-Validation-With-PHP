<?php
$host = 'localhost';
$database = 'auth_php';
$username = 'debian-sys-maint';
$password = 'nqstnSi3ksBEBa32';

$conn = mysqli_connect($host, $username, $password, $database);
if (mysqli_connect_errno($conn)) {
    echo "Server ERROR";
}
?>