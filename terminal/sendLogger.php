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

if($method == 'POST') {
    $terminal_time  = $_POST['terminal_time'];
	$token          = $_POST['token'];
    $log            = $_POST['log'];
}
if($method == 'GET') {
    $terminal_time  = $_GET['terminal_time'];
	$token          = $_GET['token'];
    $log            = $_GET['log'];
}

$query_select = "SELECT * FROM logger WHERE token = '$token'";

$query_insert = "INSERT INTO logger 
				(terminal_time, log, token) 
				VALUES ('$terminal_time', 
						'$log', 
						'$token')";

$query_select_min = "SELECT MIN(id_logger) FROM logger WHERE token = '$token' LIMIT 1";

if(mysqli_connect_error()) {
	echo "Koneksi Database Gagal <br>";
	echo mysqli_connect_error();
} else {
	if($result_select = mysqli_query($con,$query_select)) {
        if(mysqli_num_rows($result_select) >= 100) {
            if($result = mysqli_query($con,$query_select_min)) {
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_row($result)) {
                        $getData[] = $row;
                    };
        
                    foreach($getData as $data) {
                        $id = $data[0];
                    };
                }
            }
            if(!empty($id)) {
                if($result_delete = mysqli_query($con,"DELETE FROM logger WHERE token = '$token' AND id_logger = '$id'")) {
                    if(mysqli_affected_rows($con) > 0) {
                        echo 'Delete Data ' , $id , " Sukses";
							if(mysqli_query($con,$query_insert)) {
								if(mysqli_affected_rows($con) > 0) {
									echo 'Insert Data Sukses';
								} else {
									echo 'Insert Gagal <br>' , mysqli_error($con);
								}
							} else { 
								echo'Insert Gagal <br>' , mysqli_error($con);
							}
                    } else echo 'Delete Gagal <br>' , mysqli_error($con);
                }
            }
		} else {
            if(mysqli_num_rows($result_select) < 100) {
                if(mysqli_query($con,$query_insert)) {
                    if(mysqli_affected_rows($con) > 0) {
                        echo 'Insert Data Sukses';
                    } else {
                        echo 'Insert Gagal <br>' , mysqli_error($con);
                    }
                } else { 
                    echo'Insert Gagal <br>' , mysqli_error($con);
                }
            }
        }
	}
}
mysqli_close($con);
?>