<?php
$method = $_SERVER['REQUEST_METHOD'];

define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/system/dotenv/autoloader.php';
$dotenv = new Dotenv\Dotenv(__ROOT__);
$dotenv->load();

$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$code               = $_REQUEST['code'];
$account_name       = $_REQUEST['account_name'];
$account_number     = $_REQUEST['account_number'];
$account_type       = $_REQUEST['account_type'];
$account_server     = $_REQUEST['account_server'];
$ea_name            = $_REQUEST['ea_name'];
$ea_symbols         = $_REQUEST['ea_symbols'];
$ea_settings        = $_REQUEST['ea_settings'];
$ea_start           = $_REQUEST['ea_start'];
$account_location   = $_REQUEST['account_location'];
$any_details        = $_REQUEST['any_details'];
$last_update        = $_REQUEST['last_update'];
$token              = $_REQUEST['token'];

$query_insert = "INSERT INTO monitoring 
				(`code`,`account_name`,`account_number`,`account_type`,`account_server`,`ea_name`,`ea_symbols`,`ea_settings`,
				`ea_start`,`account_location`,`any_details`,`last_update`,`token`) 
				VALUES ('$code','$account_name','$account_number','$account_type','$account_server','$ea_name','$ea_symbols',
				'$ea_settings','$ea_start','$account_location','$any_details','$last_update','$token')";

if (mysqli_connect_error()) {
    echo "Koneksi Database Gagal <br>";
    echo mysqli_connect_error();
} else {
    if (mysqli_query($connect, $query_insert)) {
        if (mysqli_affected_rows($connect) > 0) {
            echo 'Insert Data Sukses';
        } else {
            echo 'Insert Gagal <br>', mysqli_error($connect);
        }
    } else {
        echo 'Insert Gagal <br>', mysqli_error($connect);
    }
}
mysqli_close($connect);
