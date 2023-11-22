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

if ($method == 'POST') {
	$code 				= $_POST['code'];
	$account_name 		= $_POST['account_name'];
	$account_number 	= $_POST['account_number'];
	$account_type 		= $_POST['account_type'];
	$account_server 	= $_POST['account_server'];
	$ea_name 			= $_POST['ea_name'];
	$ea_symbols 		= $_POST['ea_symbols'];
	$ea_settings 		= $_POST['ea_settings'];
	$ea_start 			= $_POST['ea_start'];
	$ea_day_trade 		= $_POST['ea_day_trade'];
	$account_balance 	= $_POST['account_balance'];
	$account_equity 	= $_POST['account_equity'];
	$total_order 		= $_POST['total_order'];
	$ea_running_symbol 	= $_POST['ea_running_symbol'];
	$floating 			= $_POST['floating'];
	$drawdown 			= $_POST['drawdown'];
	$drawdown_percent	= $_POST['drawdown_percent'];
	$drawdown_date      = $_POST['drawdown_date'];
	$today_profit 		= $_POST['today_profit'];
	$total_profit 		= $_POST['total_profit'];
	$daily_profit 		= $_POST['daily_profit'];
	$daily_romad		= $_POST['daily_romad'];
	$daily_percentage	= $_POST['daily_percentage'];
	$account_first_balance = $_POST['account_first_balance'];
	$account_total_deposit = $_POST['account_total_deposit'];
	$account_total_withdraw = $_POST['account_total_withdraw'];
	$account_romad 		= $_POST['account_romad'];
	$account_location 	= $_POST['account_location'];
	$any_details 		= $_POST['any_details'];
	$last_update 		= $_POST['last_update'];
	$token 				= $_POST['token'];
}
if ($method == 'GET') {
	$code 				= $_GET['code'];
	$account_name 		= $_GET['account_name'];
	$account_number 	= $_GET['account_number'];
	$account_type 		= $_GET['account_type'];
	$account_server 	= $_GET['account_server'];
	$ea_name			= $_GET['ea_name'];
	$ea_symbols 		= $_GET['ea_symbols'];
	$ea_settings 		= $_GET['ea_settings'];
	$ea_start 			= $_GET['ea_start'];
	$ea_day_trade 		= $_GET['ea_day_trade'];
	$account_balance 	= $_GET['account_balance'];
	$account_equity 	= $_GET['account_equity'];
	$total_order 		= $_GET['total_order'];
	$ea_running_symbol 	= $_GET['ea_running_symbol'];
	$floating 			= $_GET['floating'];
	$drawdown 			= $_GET['drawdown'];
	$drawdown_percent	= $_GET['drawdown_percent'];
	$drawdown_date      = $_GET['drawdown_date'];
	$today_profit 		= $_GET['today_profit'];
	$total_profit 		= $_GET['total_profit'];
	$daily_profit 		= $_GET['daily_profit'];
	$daily_romad		= $_GET['daily_romad'];
	$daily_percentage	= $_GET['daily_percentage'];
	$account_first_balance = $_GET['account_first_balance'];
	$account_total_deposit = $_GET['account_total_deposit'];
	$account_total_withdraw = $_GET['account_total_withdraw'];
	$account_romad 		= $_GET['account_romad'];
	$account_location 	= $_GET['account_location'];
	$any_details	 	= $_GET['any_details'];
	$last_update 		= $_GET['last_update'];
	$token 				= $_GET['token'];
}

$query_select = "SELECT * FROM monitoring 
				WHERE code = '$code' AND account_name = '$account_name'
				AND account_number = '$account_number'
				AND token = '$token'";

$query_insert = "INSERT INTO monitoring 
				(`code`,`account_name`,`account_number`,`account_type`,`account_server`,`ea_name`,`ea_symbols`,`ea_settings`,
				`ea_start`,`ea_day_trade`,`account_balance`,`account_equity`,`total_order`,`ea_running_symbol`,`floating`,`drawdown`,`drawdown_percent`, `drawdown_date`,
				`today_profit`,`total_profit`,`daily_profit`,`daily_romad`,`daily_percentage`,`account_first_balance`,`account_total_deposit`,`account_total_withdraw`,`account_romad`,
				`account_location`,`any_details`,`last_update`,`token`) 
				VALUES ('$code','$account_name','$account_number','$account_type','$account_server','$ea_name','$ea_symbols',
				'$ea_settings','$ea_start','$ea_day_trade','$account_balance','$account_equity','$total_order','$ea_running_symbol',
				'$floating','$drawdown','$drawdown_percent','$drawdown_date','$today_profit','$total_profit','$daily_profit','$daily_romad','$daily_percentage','$account_first_balance','$account_total_deposit','$account_total_withdraw',
				'$account_romad','$account_location','$any_details','$last_update','$token')";

$query_update = "UPDATE monitoring 
				SET ea_name 			= '$ea_name',
					ea_symbols 			= '$ea_symbols',
					ea_settings 		= '$ea_settings',
					ea_start 			= '$ea_start',
					ea_day_trade 		= '$ea_day_trade',
					account_balance 	= '$account_balance',
					account_equity 		= '$account_equity',
					total_order 		= '$total_order',
					ea_running_symbol 	= '$ea_running_symbol',
					floating 			= '$floating',
					drawdown 			= '$drawdown',
					drawdown_percent	= '$drawdown_percent',
					drawdown_date       = '$drawdown_date',
					today_profit 		= '$today_profit',
					total_profit 		= '$total_profit',
					daily_profit        = '$daily_profit',
					daily_romad			= '$daily_romad',
					daily_percentage	= '$daily_percentage',
					account_first_balance 	= '$account_first_balance',
					account_total_deposit 	= '$account_total_deposit',
					account_total_withdraw 	= '$account_total_withdraw',
					account_romad 		= '$account_romad',
					account_location 	= '$account_location',
					any_details 		= '$any_details',
					last_update 		= '$last_update'				
				WHERE account_number    = '$account_number' 
				AND   token             = '$token'
				AND	  code				= '$code'";

$query_delete = "DELETE FROM monitoring WHERE last_update <= date_sub(now(), interval 4320 minute)";

if (mysqli_connect_error()) {
	echo "Koneksi Database Gagal <br>";
	echo mysqli_connect_error();
} else {
	if ($result_select = mysqli_query($connect, $query_select)) {
		if (mysqli_num_rows($result_select) > 0) {
			if (mysqli_query($connect, $query_update)) {
				if (mysqli_affected_rows($connect) > 0) {
					echo 'Update Sukses';
				} else {
					echo 'Update Gagal <br>', mysqli_error($connect);
				}
			} else {
				echo 'Update Gagal <br>', mysqli_error($connect);
			}
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
	}
	mysqli_query($connect, $query_delete);
}
mysqli_close($connect);
