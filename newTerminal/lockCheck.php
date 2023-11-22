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

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST') {
$code = $_POST['code'];
$token = $_POST['token'];
}

if($method == 'GET') {
$code = $_GET['code'];
$token = $_GET['token'];
}

$query = "SELECT * FROM code WHERE code = '$code' AND token = '$token'";
$result = mysqli_query($connect,$query);

    if(mysqli_connect_error()) {
        echo "Koneksi Database Gagal";
    } else {
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_row($result)) {
                $getData[] = $row;
            };
        
            foreach($getData as $data) {
                echo
                    $data[1],'|',
                    date("Y.m.d",strtotime($data[2]));
            };
        } else {		
        echo 'Lisensi Tidak Ditemukan';
        }
    }
    
mysqli_close($connect);
