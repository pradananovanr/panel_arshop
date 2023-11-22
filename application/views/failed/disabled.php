
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Unavailable</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=base_url()?>assets/assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="<?=base_url()?>assets/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['<?=base_url()?>assets/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/assets/css/azzara.min.css">
</head>
<body class="page-not-found">
	<div class="wrapper not-found">
		<h1 class="animated fadeIn">Unavailable</h1>
		<div class="desc animated fadeIn"><span>SORRY</span><br/>This Link Not Available for Public</div>
	</div>
	<script src="<?=base_url()?>assets/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/assets/js/core/popper.min.js"></script>
	<script src="<?=base_url()?>assets/assets/js/core/bootstrap.min.js"></script>
</body>
</html>