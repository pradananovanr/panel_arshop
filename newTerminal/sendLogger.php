<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/system/dotenv/autoloader.php';
$dotenv = new Dotenv\Dotenv(__ROOT__);
$dotenv->load();

$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER'); 
$db_pass = getenv('DB_PASSWORD'); 
$db_name = getenv('DB_NAME'); 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$method = $_SERVER['REQUEST_METHOD'];

$terminal_time = $_REQUEST['terminal_time'];
$token = $_REQUEST['token'];
$log = $_REQUEST['log'];

$query_select = "SELECT COUNT(*) as count FROM logger WHERE token = '$token'";
$query_insert = "INSERT INTO logger (terminal_time, log, token) VALUES ('$terminal_time', '$log', '$token')";
$query_select_min = "SELECT MIN(id_logger) FROM logger WHERE token = '$token' LIMIT 1";

$con = mysqli_connect("localhost", "root", "", "logger");

if (!$con) {
    echo "Koneksi Database Gagal: " . mysqli_connect_error();
}

$result_select = mysqli_query($con, $query_select);
$row = mysqli_fetch_assoc($result_select);
$count = (int) $row['count'];

if ($count >= 100) {
    $result_select_min = mysqli_query($con, $query_select_min);
    $row = mysqli_fetch_row($result_select_min);
    $id = $row[0];

    if (!empty($id)) {
        $result_delete = mysqli_query($con, "DELETE FROM logger WHERE token = '$token' AND id_logger = '$id'");

        if (mysqli_affected_rows($con) > 0) {
            echo "Delete Data $id Sukses";
        } else {
            echo "Delete Gagal: " . mysqli_error($con);
        }
    }
} else {
    $result_insert = mysqli_query($con, $query_insert);

    if (mysqli_affected_rows($con) > 0) {
        echo "Insert Data Sukses";
    } else {
        echo "Insert Gagal: " . mysqli_error($con);
    }
}

mysqli_close($con);
