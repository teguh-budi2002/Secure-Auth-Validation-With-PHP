<?php

session_start();

// Melepas semua session pada variabel
$_SESSION = array();

session_destroy();

header("location: index.php?logout");
exit;
?>