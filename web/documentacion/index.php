<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut='../';$_pg_na='documentacion';
	//---------------------------------------------
	$pagina='Documentación';
	$direc='documentacion.php';
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
		//---------------------------------------------
		require_once($rut.CONF.'0mens.php');
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.CONF.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="contact__page">
		<div class="contact__warp">
			<div class="row">
				<div class="col-md-5">
					<h2><?= $pagina; ?></h2>
					<div class="contact__social">
						<a href="<?= FACE; ?>"><i class="fa fa-facebook"></i></a>
						<a href="<?= TWIT; ?>"><i class="fa fa-twitter"></i></a>
						<!--<a href=""><i class="fa fa-linkedin"></i></a>-->
						<a href="<?= INST; ?>"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				<div class="col-md-7">
					<div class="contact__text">
						<p>Celular: <a href="https://wa.me/51924741703" target="_blank">+51 924 741 703</a></p>
						<p>Correo: <a href="mailto:informes@frankmorenoalburqueque.com" target="_blank">informes@frankmorenoalburqueque.com</a></p>
						<p>Ubicación: Lima Lima Perú</p>
					</div>
				</div>
			</div>
			<div class="contact__form">
				<nav class="navbar bg-body-tertiary px-3 mb-3" id="navbar-example2">
					<a class="navbar-brand" href="#">
						<?= TIPE; ?>
					</a>
					<ul class="nav nav-pills">
						<li class="nav-item dropdown">
							<a aria-expanded="false" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
								Contenido
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#scrollspyHeading1">First</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading2">Second</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading3">Third</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
								<li><hr class="dropdown-divider"/></li>
								<li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<div class="scrollspy-example bg-body-tertiary p-3 rounded-2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0" style="max-height: 750px; overflow: auto;">
					<h4 id="scrollspyHeading1">First heading</h4>
					<p>
						Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
					</p>
					<h4 id="scrollspyHeading2">Second heading</h4>
					<p>
						Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raices en una pieza cl´sica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32
					</p>
					<h4 id="scrollspyHeading3">Third heading</h4>
					<p>
						El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
					</p>
					<h4 id="scrollspyHeading4">Fourth heading</h4>
					<p>
						Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).
					</p>
					<h4 id="scrollspyHeading5">Fifth heading</h4>
					<p>
						Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.
					</p>
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
		<?php require_once($rut.CONF.'3toastr.php'); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#enviar').click(function() {
					$('#enviar').hide();
					$('#enviando').show();
					//-----------------------------
					setTimeout(function() {
						$('#enviar').show();
						$('#enviando').hide();
					}, 5000);
				});
			});
		</script>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
	if (isset($_SESSION['sql'])) { unset($_SESSION['sql']); }