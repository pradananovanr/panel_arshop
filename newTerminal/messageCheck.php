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

if ($method == 'POST' || $method == 'GET') {
    $module = $_REQUEST['method'];
    $code = $_REQUEST['code'];
    $token = $_REQUEST['token'];

    $account_number = null;
    if (isset($_REQUEST['account_number'])) {
        $account_number = $_REQUEST['account_number'];
    }

    $query = "SELECT message FROM code WHERE code = '$code' AND token = '$token'";
    if ($module == 'account') {
        $query = "SELECT message FROM monitoring WHERE code = '$code' AND token = '$token' AND account_number = '$account_number'";
    }

    $result = mysqli_query($connect, $query);
    if (mysqli_connect_error()) {
        echo "Koneksi Database Gagal";
    } else {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                $getData[] = $row[0];
            }
            foreach ($getData as $data) {
                echo $data;
            }
        } else {
            echo mysqli_error($connect);
        }
    }
    mysqli_close($connect);
}
