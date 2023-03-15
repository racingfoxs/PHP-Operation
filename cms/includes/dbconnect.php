<?php
require("constants.php");

// 1. Create a database connection
$connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
/* check connection */
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $connection->connect_error);
    exit();
}
?>
