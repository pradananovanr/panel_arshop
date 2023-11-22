<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once __ROOT__ . '/system/dotenv/autoloader.php';
$dotenv = new Dotenv\Dotenv(__ROOT__);
$dotenv->load();

$db_host = getenv('DB_HOST');
$db_user = getenv('DB_USER'); 
$db_pass = getenv('DB_PASSWORD'); 
$db_name = getenv('DB_NAME'); 
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$code = $_REQUEST['code'];
$account_number = $_REQUEST['account_number'];
$token = $_REQUEST['token'];

$query = "SELECT * FROM monitoring WHERE code = '$code' AND account_number = '$account_number' AND token = '$token'";
$querydelete = "DELETE FROM monitoring WHERE code = '$code' AND account_number = '$account_number' AND token = '$token'";

    if(mysqli_connect_error()) {
        echo "Koneksi Database Gagal";
    } else {
        if($result_select = mysqli_query($connect,$query)) {
            if(mysqli_num_rows($result_select) > 0) {
                if(mysqli_query($connect,$querydelete)) {
                    if(mysqli_affected_rows($connect) > 0) {
                        echo 'Delete Monitoring Sukses';
                    }
                } else {
                    echo 'Delete Gagal <br>' , mysqli_error($connect);
                }
            }
        } else 'Data Tidak Ditemukan';
    }
    
mysqli_close($connect);
