<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-------------------------
	$rut = '../';
	//-------------------------
	require_once($rut.'config/constant.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?= URL; ?>favicon.ico" />
	<title>QRs Generados</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<a class="navbar-brand"><a href="<?= FMMA; ?>" target="_blank"><img src="<?= FMMA; ?>assets/images/ico490x458.webp" alt="" style="max-height: 50px;"> Frank Moreno A</a></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a href="<?= URL; ?>" class="nav-link" aria-current="page">Generador de URL y QR para Campañas y Publicidad</a>
					</li>
					<li class="nav-item">
						<a href="<?= URL; ?>lista/" class="nav-link active" aria-current="page">Ver QRs Generados</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!---->
	<div class="container-fluid" style="overflow: auto; margin-bottom: 120px;">
		<div class="row">
			<?php
				$inf=null;
				$thefolder = "../img/qr/";
				//---------------------------------
				$inf.='<ol class="list-group">';
					if ($handler = opendir($thefolder)) {
						while (false !== ($file = readdir($handler))) {
							//if (is_dir($thefolder . $file) && $file!="." && $file!=".."){
							if ($file!="." && $file!=".." && $file!="favicon.ico"){
								$inf.='<li class="list-group-item"><a href="'.$thefolder.$file.'" target="_blank">'.$file.'</a></li>';
							}
						}
						closedir($handler);
					}
				$inf.='</ol>';
				//---------------------------------
				echo $inf;
			?>
		</div>
	</div>
	<!---->
	<footer class="container-fluid fixed-bottom bg-dark">
		<div class="row p-3 m-3">
			<div class="col-sm-12 text-center">
				&copy; 2018-<?= date('Y'); ?> <a href="<?= FMMA; ?>" target="_blank">Frank Moreno</a> | Todos los derechos reservados
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>