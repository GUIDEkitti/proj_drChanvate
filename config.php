<?php
//title
$title = "Sweet Hotel";

//conn
$db_servername = "localhost";
$db_database  = "642db";
$db_username  = "root";
$db_password  = "";

$conn = mysqli_connect(
    $db_servername,
    $db_username,
    $db_password,
    $db_database
);
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo"<script>console.log('Hello sql');</script>";
}

?>
