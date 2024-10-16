<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------
	$rut='./';
	//---------------------------------
	$pagina = 'Login';
	$action = 'login.php';$action2 = 'ip_block.php';
	//---------------------------------
	require_once($rut.'config/0code.php');
	//---------------------------------------------
	$data = null;
	//---------------------------------------------
	require_once($rut.DIRACT.$action2);
	$data = sistema($rut);
	//---------------------------------------------
	if ($data->block > 0) {
		header("Location: ".$rut."error/423.shtml");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $pagina.TIT; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?= ARCH; ?>css/login.css" />
	<!-- Favicons -->
	<link href="<?= IMG; ?>favicon.png" rel="icon"/>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q69SF4RY9T"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		//---------------------------------------------
		gtag('config', 'G-Q69SF4RY9T');
	</script>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">

	<main class="form-signin w-100 m-auto">
		<form method="POST" action="<?= ACTI.$action; ?>" enctype="multipart/form-data">
			<div class="col-sm-12 text-center">
				<img class="mb-4" src="<?= 	IMG; ?>logo.png" alt="" height="80">
			</div>
			<div class="col-sm-12 text-center">
				<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
			</div>

			<div class="form-floating">
				<input type="text" class="form-control" name="user" value="admin" placeholder="name@example.com">
				<label for="floatingInput">Usuario o Correo</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" name="pass" value="admin" id="pass" placeholder="Contraseña">
				<label for="floatingPassword">Contraseña</label>
			</div>

			<div class="form-check text-start my-3">
				<input class="form-check-input"  type="checkbox" id="check" onchange="document.getElementById('pass').type = this.checked ? 'text' : 'password'">
				<label class="form-check-label" for="check">
					Ver contraseña
				</label>
			</div>
			<button class="btn btn-primary w-100 py-2" type="submit" name="entrar">Ingresar</button>
			<div class="col-sm-12 text-center">
				<p class="mt-5 mb-3 text-body-secondary">Copyrigth &copy; 2017–<?= date('Y'); ?> - <a href="<?= FMMA; ?>" target="_blank">FMMA</a></p>
			</div>
		</form>
	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>