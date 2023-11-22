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

if ($method == 'POST') {
    $module = $_POST['method'];
    $code = $_POST['code'];
    $token = $_POST['token'];

    if ($module == "license") {
        $query = "SELECT message FROM code WHERE code = '$code' AND token = '$token'";
        $result = mysqli_query($connect, $query);

        if (mysqli_connect_error()) {
            echo "Koneksi Database Gagal";
        } else {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $getData[] = $row;
                };

                foreach ($getData as $data) {
                    echo $data[0];
                };
            } else {
                echo mysqli_error($connect);
            }
        }
        mysqli_close($connect);
    }

    if ($module == "account") {
        $account_number = $_POST['account_number'];
        $query = "SELECT message FROM monitoring WHERE code = '$code' AND token = '$token' AND account_number = '$account_number' ";
        $result = mysqli_query($connect, $query);

        if (mysqli_connect_error()) {
            echo "Koneksi Database Gagal";
        } else {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $getData[] = $row;
                };

                foreach ($getData as $data) {
                    echo $data[0];
                };
            } else {
                echo mysqli_error($connect);
            }
        }
        mysqli_close($connect);
    }
}

if ($method == 'GET') {
    $module = $_GET['method'];
    $code = $_GET['code'];
    $token = $_GET['token'];

    if ($module == "license") {
        $query = "SELECT message FROM code WHERE code = '$code' AND token = '$token'";
        $result = mysqli_query($connect, $query);

        if (mysqli_connect_error()) {
            echo "Koneksi Database Gagal";
        } else {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $getData[] = $row;
                };

                foreach ($getData as $data) {
                    echo $data[0];
                };
            } else {
                echo mysqli_error($connect);
            }
        }
        mysqli_close();
    }

    if ($module == "account") {
        $account_number = $_GET['account_number'];

        $query = "SELECT message FROM monitoring WHERE code = '$code' AND token = '$token' AND account_number = '$account_number' ";
        $result = mysqli_query($connect, $query);

        if (mysqli_connect_error()) {
            echo "Koneksi Database Gagal";
        } else {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $getData[] = $row;
                };

                foreach ($getData as $data) {
                    echo $data[0];
                };
            } else {
                echo mysqli_error($connect);
            }
        }
        mysqli_close();
    }
}
