<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut='../../';$_pg_na='curso_detail';
	//---------------------------------------------
	$pagina='Detalle del Curso';
	$action='index.php';
	//---------------------------------------------
	require_once($rut.'config/0code.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?= $pagina.TIT; ?></title>
	<?php
		include_once($rut.CONF.'1styles.php');
		//---------------------------------
		$data=null;$inf=null;
		//---------------------------------
		require_once($rut.DIRACT.$action);
		$data = detalle($rut,$pid);
		//---------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}else{
			header("Location: ".$rut);
			exit();
		}
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.CONF.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="about__page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="about__text">
						<h3 class="about__title"><?= $inf->nombre; ?></h3>
						<?= $inf->descrip; ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="experience__text">
						<h3 class="about__title">Imagen:</h3>
						<img src=" <?= IMG.'cursos/'.$inf->imagen; ?>" alt="<?= $inf->nombre; ?>">
					</div>
				</div>
				<div class="col-lg-4">
					<div class="skills__text">
						<h3 class="about__title">Skills</h3>
						<p>Convierte tu gratitud en acción: cada donación impulsa la creación de contenido PHP gratuito para todos. Tu apoyo no solo construye repositorios, sino también un puente hacia un mundo de conocimiento compartido. ¡Haz clic en el botón de PayPal y únete a la revolución del código abierto hoy!</p>
						<p class="text-center">
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input name="cmd" type="hidden" value="_s-xclick"/>
								<input name="hosted_button_id" type="hidden" value="KN32TH6DXPUXQ"/>
								<input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" type="image"/>
								<img alt="" border="0" height="1" src="https://www.paypal.com/en_PE/i/scr/pixel.gif" width="1"/>
							</form>
						</p>
						<div class="single-progress-item">
							<h6>PHP</h6>
							<div class="progress-bar-style" data-progress="80"></div>
						</div>
						<div class="single-progress-item">
							<h6>HTML</h6>
							<div class="progress-bar-style" data-progress="10"></div>
						</div>
						<div class="single-progress-item">
							<h6>CSS</h6>
							<div class="progress-bar-style" data-progress="5"></div>
						</div>
						<div class="single-progress-item">
							<h6>JS</h6>
							<div class="progress-bar-style" data-progress="5"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Section end -->
	<!-- Footer Section -->
		<?php include_once($rut.CONF.'3footer.php'); ?>
	<!-- Footer Section end -->
	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.CONF.'4java.php'); ?>
	</body>
</html>