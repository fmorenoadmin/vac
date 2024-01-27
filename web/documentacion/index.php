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
		//---------------------------------------------
		$txt_url = '?utm_id=1&utm_campaign=CloidFlare&utm_source=vac.net.pe&utm_medium=redirect&utm_content=nombramiento+en+nuestra+web&utm_term=redireccionamiento';
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
								<li><a class="dropdown-item" href="#scrollspyHeading3">Primeros pasos</a></li>
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
						La metodología en si ya tiene incluido muchos temas que se podrían aprender en clases o de forma autodidacta, como: <b>Tipos de Datos, Condicionales, Bucles, Arreglos, Objetos, Clases, Instanciamientos, Sessiones, Cookies, etc.</b>
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
					<h4 id="scrollspyHeading3">Primeros pasos</h4>
					<p class="pb-3">
						Necesitas tener todo esto para poder empezar a utlizar la metodología y los archivos. <br>
						<ul class="list-group">
							<li class="list-group-item">
								<b>Descargar e instalar:</b>
								<ul class="list-group">
									<li class="list-group-item"><b>Servidor local:</b> <a target="_blank" href="https://www.apachefriends.org/es/download.html<?= $txt_url; ?>">XAMPP</a> <span class="badge bg-secondary">yo utilizo este</span>, WAMP o LAMP, ya que te ofresen un servidor virtual de manera local, donde puedes desplegar tus proyectos sin necesidad de tener un servidor o hosting.</li>
									<li class="list-group-item"><b>Editor de código:</b> <a target="_blank" href="https://www.sublimetext.com/download<?= $txt_url; ?>">Sublime Text</a> <span class="badge bg-secondary">yo utilizo este</span>, Visual Studio Code, o el de tu preferenca</li>
									<li class="list-group-item"><b>Cuenta de github:</b> Es necesario que tengas una cuenta en <a target="_blank" href="https://github.com/<?= $txt_url; ?>">GitHub</a>, ya que el repositorio y las actualizaciones se subiran en ese lugar.</li>
									<li class="list-group-item"><b>GitHub Desktop:</b> Es necesario que tengas <a target="_blank" href="https://desktop.github.com/<?= $txt_url; ?>">GitHub Desktop</a>, ya que ofrece una interface gráfica, la cual es muy sencilla y fácil de usar, para poder subir y bajar cambios, con comentarios, sin tener que hacerlo por consola. <b>(Es requerido tener la cuenta de github creada antes de la configuración de GitHub Desktop)</b></li>
									<li class="list-group-item"><b>Composer y GitBash:</b> Es <b>opcional</b> que tengas <a target="_blank" href="https://getcomposer.org/download/<?= $txt_url; ?>">Composer</a> y <a target="_blank" href="https://git-scm.com/downloads<?= $txt_url; ?>">GitBash</a>, ya que ambos de la mano te permiten descargar las actulizaciones de los paquetes y librerías.</li>
									<li class="list-group-item"><b>Hosting y Dominio:</b> Es <b>opcional</b> que tengas <a target="_blank" href="https://hosting.frankmorenoalburqueque.com/<?= $txt_url; ?>">Hosting y Dominio</a>, pero si estás interesado en alquilar alguno, te recomiendo <a target="_blank" href="https://hosting.frankmorenoalburqueque.com/<?= $txt_url; ?>">BanaHosting</a>, con el cual tengo mis productos de Hosting de manera confiable y eficiente. A un precio justo y con capacidades muy sofisticadas para tus proyectos.</li>
									<li class="list-group-item">
										<b>Descargar el Repositorio:</b> Utilizando GitHub Desktop, debes clonar <a target="_blank" href="https://github.com/fmorenoadmin/vac<?= $txt_url; ?>">Este Repositorio</a>
										<ul class="list-group">
											Estos son los pasos:
											<ol class="list-group list-group-numbered">
												<li class="list-group-item">Abrir GitHub Desktop</li>
												<li class="list-group-item">Clic en la cinta de opciones superior izquierda: File</li>
												<li class="list-group-item">En el Modal Clone a repository: Clic en la terces opción: URL</li>
												<li class="list-group-item">Pegar esta URL: <code>https://github.com/fmorenoadmin/vac.git</code></li>
												<li class="list-group-item">La ruta por defecto es: <code>C:\xampp\htdocs</code> no modificar a menos que xamp esté instalado en otro disco, o si usa otro servidor local colocar la carpeta pública de su servidor local, esto en automático creará la carpeta vac, asi que no es necesario colocarla</li>
												<li class="list-group-item">
													Cargar Base de datos:
													<ol class="list-group list-group-numbered">
														<li class="list-group-item"><a target="_blank" href="https://localhost/phpmyadmin/index.php?route=/server/sql/">Click aqui para abrir phpmyadmin</a></li>
														<li class="list-group-item">Abrir y Copiar el contenido del Archivo: <a target="_blank" href="https://localhost/vac/database.sql">database.sql</a> si no se ve con ese enlace la ruta es: <code>C:/xampp/htdocs/vac/database.sql</code> dentro del proyecto</li>
														<li class="list-group-item">Pegar todo el contenido del archivo database.sql, dentro del bloque de la consulta SQL y Luego ejecutar</li>
													</ol>
												</li>
												<li class="list-group-item">El proyecto VAC utiliza HTTPS, por lo que siempre le saldrá la alerta de </li>
											</ol>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
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
									<li class="list-group-item">Soy de: <b>Bellavista - Sullana - Piura</b>. Y Resido en: <b>Lima</b>.</li>
									<li class="list-group-item">Soy: <b>WebMaster</b>, <b>Partner de Microsoft</b>.</li>
									<li class="list-group-item">Tengo: Más de <b>6 años como programador PHP</b></li>
									<li class="list-group-item">Trabajo con: <b><a target="_blank" href="https://www.cloudflare.com/<?= $txt_url; ?>">CloudFlare</a></b> para la seguridad de dominios y Servidores.</li>
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