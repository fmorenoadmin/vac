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
								<li><a class="dropdown-item" href="#scrollspyHeading1">¿Por qué VAC?</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading2">¿Por qué usarla?</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading3">TREE</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading4">Fourth</a></li>
								<li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>
								<li><hr class="dropdown-divider"/></li>
								<li><a class="dropdown-item" href="#scrollspyHeading15">Sobre el Creador</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<div class="scrollspy-example bg-body-tertiary p-3 rounded-2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" data-bs-spy="scroll" data-bs-target="#navbar-example2" tabindex="0" style="max-height: 750px; overflow: auto;">
					<h4 id="scrollspyHeading1">¿Por qué VAC?</h4>
					<p class="pb-3">
						No quise complicarme la vida, tratando de escoger un nombre para la metodología. Por ello fui muy simple y le puse <b>VAC (*)</b><br>
						Traté de hacerlo lo más simple, al igual que la metodología en SÍ. <br>
						De esta forma, muchos personas, no solo programadores, podrían ser capaces de entender, utilizar y aprender PHP junto a la metodología. <br>
						La metodología en si ya tiene incluido muchos temas que se podrían aprender en clases o de forma autodidacta, como: <b>Tipos de Datos, Condicionales, Bucles, Arreglos, Objetos, Clases, Instanciamientos, SEssiones, Cookies, etc.</b>
						<ul class="list-group">
							<li class="list-group-item">
								<b>VAC (*)</b> solo es una abreviatura de:
								<ul class="list-group">
									<li class="list-group-item"><b>V</b> => Vistas</li>
									<li class="list-group-item"><b>A</b> => Acciones</li>
									<li class="list-group-item"><b>C</b> => Clases</li>
								</ul>
							</li>
						</ul>
					</p>
					<hr>
					<h4 id="scrollspyHeading2">¿Por qué usarla?</h4>
					<p class="pb-3">
						<b>VAC</b> Tiene mucho potencial de crecimiento constante y es apadtable a cualquier tipo de sistema.<br>
						<b>VAC</b> Soporta desde PHP7.4 hasta la última versión, sin tener problemas de deprecación, o rendimiento.<br>
						<b>VAC</b> Es compatible con 3 tipos de Bases de datos mas comunes hoy en día: <b>MySQL, PostgreSQL y SQL Server</b>.<br>
						<ul class="list-group">
							<li class="list-group-item">
								<b>Otros puntos son:</b>
								<ul class="list-group">
									<li class="list-group-item">Por que es práctica.</li>
									<li class="list-group-item">Por que es muy fácil de entender, desarrollar e implementar.</li>
									<li class="list-group-item">Por que se puede reutilizar el código.</li>
									<li class="list-group-item">Por que no demora mucho tiempo en cargar.</li>
									<li class="list-group-item">Por que no haces trabajos en la vista. Solo muestras la información.</li>
									<li class="list-group-item">Por que es de código abierto.</li>
								</ul>
							</li>
						</ul>
					</p>
					<hr>
					<h4 id="scrollspyHeading3">Third heading</h4>
					<p class="pb-3">
						El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.
					</p>
					<hr>
					<h4 id="scrollspyHeading4">Fourth heading</h4>
					<p class="pb-3">
						Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).
					</p>
					<hr>
					<h4 id="scrollspyHeading5">Fifth heading</h4>
					<p class="pb-3">
						Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.
					</p>
					<h4 id="scrollspyHeading15">Sobre el Creador</h4>
					<p class="pb-3">
						<ul class="list-group">
							<li class="list-group-item">
								<b>Todo sobre mí:</b>
								<ul class="list-group">
									<li class="list-group-item">Me llamo: <b>Frank Moreno Alburqueque</b></li>
									<li class="list-group-item">Tengo: <b><?= (date('Y') - 1994); ?> Años</b>.</li>
									<li class="list-group-item">Soy de: <b>Bellavista - Sullana - Piura</b>.</li>
									<li class="list-group-item">Soy: <b>WebMaster</b>.</li>
									<li class="list-group-item">Soy: <b>Partner de Microsoft</b>.</li>
									<li class="list-group-item">Tengo: Más de <b>6 años como programador PHP</b></li>
									<li class="list-group-item">Trabajo con: <b><a href="https://www.cloudflare.com/?utm_id=1&utm_campaign=CloidFlare&utm_source=vac.net.pe&utm_medium=redirect&utm_content=nombramiento+en+nuestra+web&utm_term=redireccionamiento">CloudFlare</a></b> para la seguridad de dominios y Servidores.</li>
									<li class="list-group-item">He desarrollado muchos Sistemas Webs, usando VAC.</li>
									<li class="list-group-item">He particido en el desarrollo de varios proyectos internacionales.</li>
								</ul>
							</li>
						</ul>
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