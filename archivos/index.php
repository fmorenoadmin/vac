<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut = './';
	$pagina = 'Archivos';
	//---------------------------------------------
	require_once($rut.'config/constant.php');
?>
<html class="h-100" data-bs-theme="dark" data-darkreader-mode="dynamic" data-darkreader-scheme="dark" lang="en">
<head>
	<title>
		<?= $pagina.TIT; ?>
	</title>
	<!-- Favicons -->
	<link href="<?= IMG; ?>favicon.png" rel="icon"/>
	<!-- SEO -->
	<meta name="keywords" content="fmorenoadmin, FMORENOADMIN, frank, base64 encode php, frank moreno, a moreno, frank martin, moreno a, eurorenting, base64_encode php, base64 php, Frank Moreno, Moreno Alburqueque, Frank Martin, Martin Moreno, Frank Moreno Alburqueque, Frank Alburqueque, Sistema Songoku" />
	<meta name="generator" content="FMORENOADMIN" />
	<meta name="author" content="Moreno Alburqueque Frank Martin, admin@fmorenoadmin.com.pe" />
	<meta name="urlauthor" content="https://www.fmorenoadmin.com.pe" />
	<meta name="copyright" content="Copyright © 2018 - <?= date('Y'); ?> Frank Martin Moreno Alburqueque" />
	<meta name="og:title" content="<?= $pagina.TIT; ?>" />
	<meta name="og:site_name" content="Frank Moreno Alburqueque" />
	<!-- Custom styles for this template -->
	<link href="https://getbootstrap.com/docs/5.3/examples/cover/cover.css" rel="stylesheet"/>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
<body class="d-flex h-100 text-center" style="background-color: transparent !important; background-image: url('//archivos.jayway.net.pe/img/141.jpg'); background-size: cover; background-position: center;background-repeat: no-repeat;">
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<header class="mb-auto">
			<div>
				<h3 class="float-md-start mb-0">
					<?= $pagina; ?>
				</h3>
				<nav class="nav nav-masthead justify-content-center float-md-end">
					<a aria-current="page" class="nav-link fw-bold py-1 px-0 active" href="<?= WEB; ?>" target="_blank">
						Página Web
					</a>
					<a class="nav-link fw-bold py-1 px-0" href="<?= SIST; ?>" target="_blank">
						Sistema
					</a>
					<!--<a class="nav-link fw-bold py-1 px-0" href="#">
						Contact
					</a>-->
				</nav>
			</div>
		</header>
		<main class="px-3">
			<h1>
				<?= TIPE; ?>
			</h1>
			<p class="lead">
				El acceso a estos recursos es privado, si deseas puedes diregirte a nuestra web o nuestro sistema.
			</p>
			<p class="lead">
				<a class="btn btn-lg btn-light fw-bold border-white bg-white" href="<?= WEB; ?>" target="_blank">
					Página Web
				</a>
			</p>
		</main>
		<footer class="mt-auto text-white-50">
			<p>
				Copyrigth &copy; 2019 - <?= date('Y'); ?>
				<a class="text-white" href="//getbootstrap.com/" target="_blank">Bootstrap</a>, Desarrollado por
				<a class="text-white" href="<?= FMMA; ?>" target="_blank">Frank Moreno</a>.
			</p>
		</footer>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>