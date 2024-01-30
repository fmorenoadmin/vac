<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut='../';$_pg_na='index';
	//---------------------------------------------
	$pagina='Principal';
	$action='index.php';//contiene el nombre de la acción
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
		//-----------------------------------
		$data = null;$inf=null;
		//-----------------------------------
		require_once($rut.DIRACT.$action);//requiero a mi acción
		$data = index($rut);
		//-----------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.CONF.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Blog Page -->
	<div class="blog__single__page">
		<article class="blog__article">
			<div class="blog__container">
				<div class="blog__header">
					<div class="blog__cata"><?= $pagina; ?></div>
					<h2 class="blog__single__title">¿Que es esta vista?</h2>
				</div>
				<p>
					Esta vista, es el resultado de mi metodología. <br>
					No tarda mucho tiempo en cargar. <br>
					Las vistas solo muestran información ya lista que devuelve la Clase, a la Acción y la Acción a la Vista. <br>
				</p>
				<code>
					require_once($rut.DIRACT.$action);//requiero a mi acción<br>
					$data = index($rut);//guardo en la variable <b>$data</b>, lo que me devuelva la función <b>index()</b> de la Acción<br>
					//-----------------------------------<br>
					if (isset($data->inf)) {//Sí existe la variable <b>inf</b> dentro del objeto <b>$data</b><br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf = $data->inf;// guardo el contenido de la varialbe <b>inf</b> del objeto <b>$data</b>, dentro de la variable <b>$inf</b><br>
					}
				</code>
				<hr>
				<code>
					&#60;section class="hero__section"&#62; <br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#60;&#63;= $inf; $inf=null; ?&#62;<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#60;!-- Muestro el contenido de la variable <b>$inf</b> y Limpio el contenido para ahorrar memoria --&#62;<br>
					&#60;&#63;&#47;section&#62;
				</code>
			</div>
		</article>
	</div>
	<!-- Blog Page end -->

	<!-- Hero Section -->
	<section class="hero__section">
		<?= $inf; $inf=null; ?>
	</section>
	<!-- Hero Section end -->

	<!-- Footer Section -->
		<?php include_once($rut.CONF.'3footer.php'); ?>
	<!-- Footer Section end -->

	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.CONF.'4java.php'); ?>

	</body>
</html>