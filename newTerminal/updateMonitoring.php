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
$account_number     = $_REQUEST['account_number'];
$token              = $_REQUEST['token'];

$ea_day_trade       = $_REQUEST['ea_day_trade'];
$account_balance    = $_REQUEST['account_balance'];
$account_equity     = $_REQUEST['account_equity'];
$total_order        = $_REQUEST['total_order'];
$ea_running_symbol  = $_REQUEST['ea_running_symbol'];
$floating           = $_REQUEST['floating'];
$drawdown           = $_REQUEST['drawdown'];
$drawdown_percent   = $_REQUEST['drawdown_percent'];
$drawdown_date      = $_REQUEST['drawdown_date'];
$today_profit       = $_REQUEST['today_profit'];
$total_profit       = $_REQUEST['total_profit'];
$daily_profit       = $_REQUEST['daily_profit'];
$daily_romad        = $_REQUEST['daily_romad'];
$daily_percentage   = $_REQUEST['daily_percentage'];
$account_first_balance  = $_REQUEST['account_first_balance'];
$account_total_deposit  = $_REQUEST['account_total_deposit'];
$account_total_withdraw = $_REQUEST['account_total_withdraw'];
$account_romad       = $_REQUEST['account_romad'];
$last_update         = $_REQUEST['last_update'];

$query_update = "UPDATE monitoring 
				SET ea_day_trade 		= '$ea_day_trade',
					account_balance 	= '$account_balance',
					account_equity 		= '$account_equity',
					total_order 		= '$total_order',
					ea_running_symbol 	= '$ea_running_symbol',
					floating 			= '$floating',
					drawdown 			= '$drawdown',
					drawdown_percent	= '$drawdown_percent',
					today_profit 		= '$today_profit',
					total_profit 		= '$total_profit',
					daily_profit        = '$daily_profit',
					daily_romad			= '$daily_romad',
					daily_percentage	= '$daily_percentage',
					drawdown_date       = '$drawdown_date',
					account_first_balance 	= '$account_first_balance',
					account_total_deposit 	= '$account_total_deposit',
					account_total_withdraw 	= '$account_total_withdraw',
					account_romad 		= '$account_romad',
					last_update 		= '$last_update'				
				WHERE account_number    = '$account_number' 
				AND   token             = '$token'
				AND	  code				= '$code'";

$query_delete = "DELETE FROM monitoring WHERE last_update <= date_sub(now(), interval 4320 minute)";

if (mysqli_connect_error()) {
    echo "Koneksi Database Gagal <br>";
    echo mysqli_connect_error();
} else {
    if (mysqli_query($connect, $query_update)) {
        if (mysqli_affected_rows($connect) > 0) {
            echo 'Update Data Sukses';
        } else {
            echo 'Update Gagal <br>', mysqli_error($connect);
        }
    } else {
        echo 'Update Gagal <br>', mysqli_error($connect);
    }
    mysqli_query($connect, $query_delete);
}
mysqli_close($connect);
