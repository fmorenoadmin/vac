<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut='../';$_pg_na='documentacion';
	//---------------------------------------------
	$pagina='Documentación';
	$action='documentacion.php';
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
	<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
	<style media="screen">.vjs-marker{position:absolute;left:0;bottom:0;opacity:1;height:100%;transition:opacity .2s ease;-webkit-transition:opacity .2s ease;-moz-transition:opacity .2s ease}.vjs-marker:hover{cursor:pointer;-webkit-transform:scale(1.3,1.3);-moz-transform:scale(1.3,1.3);-o-transform:scale(1.3,1.3);-ms-transform:scale(1.3,1.3);transform:scale(1.3,1.3)}.vjs-tip{visibility:hidden;display:block;opacity:.8;padding:5px;font-size:10px;position:absolute;bottom:14px;z-index:100000}.vjs-tip .vjs-tip-arrow{background:url(data:image/gif;base64,R0lGODlhCQAJAIABAAAAAAAAACH5BAEAAAEALAAAAAAJAAkAAAIRjAOnwIrcDJxvwkplPtchVQAAOw==) bottom left no-repeat;bottom:0;left:50%;margin-left:-4px;position:absolute;width:9px;height:5px}.vjs-tip .vjs-tip-inner{border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;padding:5px 8px 4px;background-color:#000;color:#fff;max-width:200px;text-align:center}.vjs-break-overlay{visibility:hidden;position:absolute;z-index:100000;top:0}.vjs-break-overlay .vjs-break-overlay-text{padding:9px;text-align:center}
	</style>
</head>
<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX8CQ346"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
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
				<p align="center">
					<img src="https://archivos.sistemasongoku.com/fmoreno_7X7KyN5phPGy/imagenes/ico490x458.png" height="125px" title="Icono">
				</p>
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
								<li><a class="dropdown-item" href="#scrollspyHeading4">Archivos Importantes</a></li>
								<!--<li><a class="dropdown-item" href="#scrollspyHeading5">Fifth</a></li>-->
								<li><hr class="dropdown-divider"/></li>
								<li><a class="dropdown-item" href="#scrollspyHeading14">Vídeo</a></li>
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
									<li class="list-group-item"><b>Navegador Web:</b> <a target="_blank" href="https://www.mozilla.org/es-ES/firefox/developer/<?= $txt_url; ?>">Firefox Developers Edition</a> <span class="badge bg-secondary">yo utilizo este</span>, Google Chrome o el se su preferencia. Recomiendo: Firefox Developers Edition, porque tiene una estabilidad mejor y un inspeccionador de código mejor que Google Chrome.</li>
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
												<li class="list-group-item">Clic en la opción: Clone repository</li>
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
												<li class="list-group-item">Arbir el proyecto: <a href="<?= URL; ?>" target="_blank">Clic aqui para abrirlo.</a> El proyecto VAC utiliza HTTPS, por lo que siempre le saldrá la alerta del certificado SSL, como sitio inseguro, solo debe dar clic en: <code>Avanzado -> Acceder de todas formas</code></li>
											</ol>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</p>
					<hr>
					<h4 id="scrollspyHeading4">Archivos Importantes</h4>
					<p class="pb-3">
						Antes de comenzar, debes tener en cuenta que hay archivos que son importantes para el funcionamiento de la Metodología y/o Proyrecto:
						<ul class="list-group">
							<li class="list-group-item">
								Esta es la lista de Archivos importantes:
								<ul class="list-group">
									<li class="list-group-item">
										<b>vac/database.sql</b><br>
										En este archivo se debe almacenar todos los scripts SQL, para que tengas toda tu <b>Base de Datos documentada</b>, de esta manera si alguien mas quiere acceder a tu Base de Datos, va a poder tener una guia de toda la estructura de tus tablas.
										<ol class="list-group list-group-numbered">
											Estos son los ejemplos de lo que puedes y debes almacenar ahí:
											<li class="list-group-item"><b>TABLAS</b> => Creación de cada tabla, sus campos y sus tipos de datos. Las cuales se usan en todo el proyecto.</li>
											<li class="list-group-item"><b>INSERTS</b> => Primeras ingresos de datos a cada tabla, que por defecto se colocan.</li>
											<li class="list-group-item"><b>ALTER</b> => Si el proyecto las usa, es bueno tenerlas dentro del archivo.</li>
											<li class="list-group-item"><b>PROCEDURE</b> => Si el proyecto las usa, es bueno tenerlas dentro del archivo.</li>
											<li class="list-group-item"><b>FUNCTION</b> => Si el proyecto las usa, es bueno tenerlas dentro del archivo.</li>
											<li class="list-group-item"><b>etc</b></li>
										</ol>
										<ul class="list-group">
											Definición y Ejemplo:
											<li class="list-group-item">
												<code>
													DROP TABLE IF EXISTS tipos_usuarios;<br>
													--Esto elimina la tabla: <b>tipos_usuarios</b>, solo <b>SI EXISTE</b>, caso contrario no hará nada.<br>
													CREATE TABLE tipos_usuarios(<br>
													--Crea la tabla <b>tipos_usuarios</b>, con los siguientes campos:<br>
													&nbsp;&nbsp;&nbsp;&nbsp;id_tipo INT PRIMARY KEY AUTO_INCREMENT,<br>
													--Este campo: <b>id_tipo</b>, es la <b>Llave Primaria</b> de la Tabla, la cual se <b>AUTOCOMPLETA CORRELATIVAMENTE</b><br>
													&nbsp;&nbsp;&nbsp;&nbsp;nombre_t VARCHAR(250) NULL DEFAULT NULL,<br>
													--Este campo: <b>nombre_t</b>, será el nombre del tipo de usuario, el cual tiene un tipo de dato: <b>Cadena de Texto de (250) carácteres</b><br>
													&nbsp;&nbsp;&nbsp;&nbsp;descrip_t TEXT NULL DEFAULT NULL,<br>
													--Este campo: <b>descrip_t</b>, será la descipción del tipo de usuario, el cual tiene un tipo de dato: <b>Texto</b><br>
													<br>
													--Estos 8 campos que siguen: Sirven para poder manejar una auditoría de los registros de las <b>Tablas</b><br>
													&nbsp;&nbsp;&nbsp;&nbsp;created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,<br>
													&nbsp;&nbsp;&nbsp;&nbsp;id_created INT NULL DEFAULT 1,<br>
													--Estos 2 guardan el <b>ID</b> del empleado y <b>FECHA</b>, de la creación del registro.<br>
													&nbsp;&nbsp;&nbsp;&nbsp;updated_at DATETIME NULL DEFAULT NULL,<br>
													&nbsp;&nbsp;&nbsp;&nbsp;id_updated INT NULL DEFAULT 0,<br>
													--Estos 2 guardan el <b>ID</b> del empleado y <b>FECHA</b>, de la última edición del registro.<br>
													&nbsp;&nbsp;&nbsp;&nbsp;drop_at DATETIME NULL DEFAULT NULL,<br>
													&nbsp;&nbsp;&nbsp;&nbsp;motivo_drop TEXT NULL DEFAULT NULL,<br>
													&nbsp;&nbsp;&nbsp;&nbsp;id_drop INT NULL DEFAULT 0,<br>
													--Estos 3 guardan el <b>ID</b> del empleado, el <b>MOTIVO</b> y <b>FECHA</b>, de la eliminación del registro.<br>
													&nbsp;&nbsp;&nbsp;&nbsp;status INT NULL DEFAULT 1<br>
													--Este campo sirve para el <b>ESTADO</b> del registro:<br>
													--<b>0</b> => Registro <b>INACTIVO</b><br>
													--<b>1</b> => Registro <b>ACTIVO</b><br>
													--<b>2</b> => Registro <b>ELIMINADO</b><br>
													);<br>
													INSERT INTO tipos_usuarios (nombre_t) VALUES<br>
													&nbsp;&nbsp;&nbsp;&nbsp;('Super Administrador'),<br>
													&nbsp;&nbsp;&nbsp;&nbsp;('Administrador'),<br>
													&nbsp;&nbsp;&nbsp;&nbsp;('Vendedor'),<br>
													&nbsp;&nbsp;&nbsp;&nbsp;('Comprador'),<br>
													&nbsp;&nbsp;&nbsp;&nbsp;('Almacen'),<br>
													&nbsp;&nbsp;&nbsp;&nbsp;('Finanzas')<br>
													;
												</code>
											</li>
										</ul>
									</li>
									<li class="list-group-item">
										<b>web/config/0code.php</b><br>
										Archivo de configuración global para las cabeceras de los archivos.
										<ul class="list-group">
											Estructura del archivo:
											<li class="list-group-item">
												<code>
													1  <b>&#60;&#63;php</b>// Apertura de PHP<br>
													2  <b>require_once($rut.'config/constant.php');</b><br>
													//Requere al archivo de las constantes en todas las vistas.<br>
													4  <b>$location = ((SCHU=='_qas') ? HTTPS : HTTP2).$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];</b><br>
													//Esta variable: <b>$location</b> va a Almacenar la <b>RUTA URL</b> completa, actual en la cual nos encontrramos actualmente. Dependiendo del <b>ESQUEMA ACTUAL</b>.<br>Si es: <b>_qas</b> entonces usará la constante: <b>HTTPS que su valor es: https://</b>, y si es <b>_prd</b> entonces usará la constante: <b>HTTP2 que su valor es: https://www.</b><br>
													6  <b>$uri = $_SERVER['REQUEST_URI'];</b><br>
													//Esta variable almacena solo la ruta URI, la cual va despues del dominio, ejemplo esta es la <b>URI</b> acutal: <b><?= $_SERVER['REQUEST_URI']; ?></b>. Esto varia dependiendo si estas en <b>_qas</b> o en <b>_prd</b>.<br>
													8  <b>$exp_url = explode('.', $_SERVER['HTTP_HOST']);</b><br>
													//Esto lo que hace es: <b>DIVIDIR</b> el dominio en partes separandolas por: <b>. (punto)</b>, de esta manera si existen puntos en el dominio de dividirá y se creará un array con la cadena dividida. Ejemplo:<br>
													//<pre><?php var_dump($exp_url); ?></pre>
													//Esto va a variar dependiendo si estas en <b>_qas</b> o en <b>_prd</b>.<br>
													9  if (SCHU == '_qas') {<br>
													// <b>Sí</b> el <b>ESQUEMA</b> es <b>_qas</b> entonces hago lo que está en las lineas <b>10, 11, 12 y 13</b><br>
													10 &nbsp;&nbsp;&nbsp;&nbsp;if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {<br>
													// <b>Sí</b> está vacía la variable <b>HTTPS</b> del array <b>$_SERVER</b>, ó el valor de la variable <b>HTTPS</b> del array <b>$_SERVER</b> es igual a: <b>"off"</b>, entonces:<br>
													11 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header('Location: '.$location);<br>
													// Lo redirecciono a la variable: <b>$location</b>, de la línea 4 de este archivo.<br>
													12 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit();<br>
													// Escapo de la ejecución del resto del archivo.<br>
													13 &nbsp;&nbsp;&nbsp;&nbsp;}<br>
													14 }else{<br>
													// Caso contrario, cuando el <b>ESQUEMA</b> se <b>_prd</b>, ejecuto lo de las lineas: <b>15 al 24</b><br>
													15 &nbsp;&nbsp;&nbsp;&nbsp;if ($exp_url[0] == 'www' || $exp_url[0] == 'www.' || $exp_url[1] == 'www' || $exp_url[1] == 'www.') {<br>
													// Sí en la variable <b>[0]</b> del array: <b>$exp_url</b>, de la línea: <b>8</b>. Es igual a: <b>"www"</b> ó es igual a: <b>"www."</b><br>
													// Ó sí en la variable <b>[1]</b> del array: <b>$exp_url</b>, de la línea: <b>8</b>. Es igual a: <b>"www"</b> ó es igual a: <b>"www."</b><br>
													// Entonces ejecuto lo que está en las lineas: <b>16 al 20</b><br>
													16 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$location = HTTPS.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];<br>
													// Reescribo el valor de la variable: <b>$location</b>, Usando <b>HTTPS</b>, ya que su valor es: <b>"https://"</b>. <br>
													// Esto se hace, porque la URL yá tiene el: <b>"www."</b> en la URL<br>
													17 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {<br>
													// <b>Sí</b> está vacía la variable <b>HTTPS</b> del array <b>$_SERVER</b>, ó el valor de la variable <b>HTTPS</b> del array <b>$_SERVER</b> es igual a: <b>"off"</b>, entonces:<br>
													18 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header('Location: '.$location);<br>
													// Lo redirecciono a la variable: <b>$location</b> reescrita, de la línea 16 de este archivo.<br>
													19 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit();<br>
													// Escapo de la ejecución del resto del archivo.<br>
													20 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
													21 &nbsp;&nbsp;&nbsp;&nbsp;}else{<br>
													// Caso contrarío<br>
													22 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;header("Location: ".$location);<br>
													// Lo redirecciono a la variable: <b>$location</b>, de la línea 4 de este archivo.<br>
													23 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;exit();<br>
													// Escapo de la ejecución del resto del archivo.<br>
													24 &nbsp;&nbsp;&nbsp;&nbsp;}<br>
													25 }<br>
												</code>
											</li>
										</ul>
									</li>
									<li class="list-group-item">
										<b>web/config/constant.php</b><br>
										Archivo de configuración global para las <b>Variables Globales</b> del Proyecto.
										<ul class="list-group">
											Estructura del archivo:
											<li class="list-group-item">
												<code>
													1  <b>&#60;&#63;php</b>// Apertura de PHP<br>
													2  <b>date_default_timezone_set("America/Lima");</b><br>
													// Definimos la región en la que nos encontramos, para <b>DATATIME</b>. En mi Caso como estoy en Perú es <b>America/Lima</b><br>
													3  <b>header("Access-Control-Allow-Origin: domain.ext");</b><br>
													8  <b>header("Access-Control-Allow-Origin: subdomain.domain.ext");</b><br>
													// De la Línea: <b>3 al 8</b>. Se definen los <b>dominios</b> que tienen permitido hacer uso de los recursos como: <b>css, scss, js, woff, woff2, eot, ttf, otf, imágenes, videos, etc.</b><br>
													10 <b>define('HTTP', 'http://');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>HTTP</b>, la cual tiene como valor: <b>'http://'</b><br>
													11 <b>define('HTTPS', 'https://');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>HTTPS</b>, la cual tiene como valor: <b>'https://'</b><br>
													12 <b>define('HTTP2', 'https://www.');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>HTTP2</b>, la cual tiene como valor: <b>'https://www.'</b><br>
													14 <b>define('TIT', ' | Metedología VAC-PHP');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>TIT</b>, la cual tiene como valor: <b>' | Metedología VAC-PHP'</b>. Y se usa para concatenar a la variable: <b>$pagina</b> de las vistas, y se mostrará como el Título de la página actual.<br>
													15 <b>define('TIPE', 'Metedología VAC-PHP');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>TIPE</b>, la cual tiene como valor: <b>'Metedología VAC-PHP'</b>. Y se usa como el nómbre del Proyecto, este calor es usa en varios archivos.<br>
													17 <b>define('DIRMOR', 'MORENOCL/');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>DIRMOR</b>, la cual tiene como valor: <b>'MORENOCL/'</b>. Esta carpeta es el lugar donde se almacenarán todos los archivos de: <b>Clases</b> del proyecto.<br>
													18 <b>define('DIRACT', 'ACTIONJF/');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>DIRACT</b>, la cual tiene como valor: <b>'ACTIONJF/'</b>. Esta carpeta es el lugar donde se almacenarán todos los archivos de: <b>Acciones</b> del proyecto.<br>
													20 <b>define('DIRERR', '/error/');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>DIRERR</b>, la cual tiene como valor: <b>'/error/'</b>. Esta carpeta es el lugar donde se alamacenan los archivos de error <b>.shtml</b><br>
													21 <b>define('CONF', 'config/');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>CONF</b>, la cual tiene como valor: <b>'config/'</b>. Esta carpeta es el lugar donde se alamacenan los archivos de configuración del Proyecto.<br>
													22 <b>define('VIEW', 'views/');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>VIEW</b>, la cual tiene como valor: <b>'views/'</b>. Esta carpeta es el lugar donde se alamacenan vistas que pueden ser llamadas desde varias vistas globales.<br>
													24 <b>define('DB_TYPE', 'mysqli_');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>DB_TYPE</b>, la cual tiene como valor: <b>'mysqli_'</b>. Y se usa para poder usar el proyecto con una base de datos <b>MySQL</b>.<br>
													25 <b>//define('DB_TYPE', 'pg_');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>DB_TYPE</b>, la cual tiene como valor: <b>'pg_'</b>. Y se usa para poder usar el proyecto con una base de datos <b>PostgreSQL</b>.<br>
													26 <b>//define('DB_TYPE', 'sqlsrv_');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>DB_TYPE</b>, la cual tiene como valor: <b>'sqlsrv_'</b>. Y se usa para poder usar el proyecto con una base de datos <b>SQL Server</b>.<br>
													26 <b>define('ROWS', 25);</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>ROWS</b>, la cual tiene como valor: <b>25</b>. Y se usa para poder mostrar una cantidad de filas determinadas para las tablas del proyecto.<br>
													// En caso de necesitar que una tabla en específico, muestre una cantidad de filas distanta a las demás. Solo necesitamos crear una nueva constante: <b>define('ROWS2', 50);// con la cantidad de filas que necesitas en tu tabla.</b><br>
													// Después de crear las constantes lo siguiente que debes de hacer es:<br>
													<ol class="list-group list-group-numbered">
														<li>
															&nbsp;&nbsp;&nbsp;&nbsp;1.- En la Acción: <b>if (isset($_POST['busq'])) {</b><br>
															&nbsp;&nbsp;&nbsp;&nbsp;$total = ROWS;<br>
															&nbsp;&nbsp;&nbsp;&nbsp;Modificar esta constante: <b>ROWS</b> por: <b>ROWS2</b>
														</li>
														<li>
															&nbsp;&nbsp;&nbsp;&nbsp;2.- En la Clase: <b>function listar($total,$pag,$rid,$uid,$url,$busq=null,$val=null,$test=false){</b><br>
															&nbsp;&nbsp;&nbsp;&nbsp;$resultados_por_pagina = ROWS;<br>
															&nbsp;&nbsp;&nbsp;&nbsp;Modificar esta constante: <b>ROWS</b> por: <b>ROWS2</b>
														</li>
													</ol>
													// Con esto esa vista en específico, mostrará una cantidad de registros Distinta, de las demás.<br>
													30 <b>define('SCHU', '_qas');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>SCHU</b>, la cual tiene como valor: <b>'_qas'</b>. Y se usa para poder especificar el <b>ESQUEMA PRUEBAS</b> del proyecto.<br>
													31 <b>//define('SCHU', '_prd');</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>SCHU</b>, la cual tiene como valor: <b>'_prd'</b>. Y se usa para poder especificar el <b>ESQUEMA PRODUCCIÓN</b> del proyecto.<br>
													32 <b>//define('SCHU_EMAIL', SCHU);</b><br>
													// Definimos una <b>CONSTANTE</b> llamada <b>SCHU_EMAIL</b>, la cual tiene como valor: <b>SCHU ESQUEMA ACTUAL</b>. Y se usa para poder especificar el <b>ESQUEMA ACTUAL EN EL ASUNTO DEL CORREO</b> para el envío del Correo.<br>
													// Cuando es <b>_qas</b>, el asunto del correo será: <b>[QAS - PRUEBAS] SEGUIDO DEL ASUNTO.</b><br>
													// Cuando es <b>_prd</b>, el asunto del correo será: <b>EL ASUNTO.</b><br>
												</code>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</p>
					<!--<hr>
					<h4 id="scrollspyHeading5">Fifth heading</h4>
					<p class="pb-3">
						Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsum generado siempre estará libre de repeticiones, humor agregado o palabras no características del lenguaje, etc.
					</p>-->
					<hr>
					<h4 id="scrollspyHeading14">Vídeo</h4>
					<p class="pb-3">
						Capacitación de la Metodología, realizada el día: <b>Sábado 28 de Enero del 2024</b><br>
						Si desas puedes descargar el vídeo, pero este pesa: <b>3.24 Gb</b>, entonces va a depender de la velocidad de tu internet.
						<div class="row pr-2 pl-2">
							<div class="col-sm-12">
								<video class="video-js vjs-default-skin" id="demo" controls style="height: 500px; width: 100%;">
									<source src="http://archivos.sistemasongoku.com/sistema_1ewrY7kPeihp/videos/Metodologia_de_Programacion_VAC-PHP.mp4" type="video/mp4">
								</video>
							</div>
						</div>
					</p>
					<hr>
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
				<p align="center">
					<label>
						Moreno Alburqueque Frank Martin<br>
						WebMaster - Programador Web PHP<br>
						<a href="mailto:admin@frankmorenoalburqueque.com">admin@frankmorenoalburqueque.com</a><br>
						<a href="<?= FMMA ?>" target="_blank"><?= FMMA ?></a><br>
						<a href="https://wa.me/+51924741703">+51 924 741 703</a>
					</label><br>
					<img src="https://archivos.sistemasongoku.com/fmoreno_7X7KyN5phPGy/imagenes/logo480x240.png" width="250px" title="Logo">
				</p>
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
		<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-markers/0.7.0/videojs-markers.js"></script>
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