<?php

$hostName = "sql212.epizy.com";
$dbUser = "epiz_33686274";
$dbPassword = "qN6pahUUqW";
$dbName = "epiz_33686274_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>