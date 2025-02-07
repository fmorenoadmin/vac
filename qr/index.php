<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//-------------------------
	$rut = './';
	//-------------------------
	require_once($rut.'config/constant.php');
	//---------------------------------------
	$pagina = 'Generador de URL | FMORENOADMIN - Tu Socio Tecnológico de Confianza';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?= URL; ?>favicon.ico" />
	<title>Generador de URL</title>
	<!-- SEO -->
	<meta name="keywords" content="fmorenoadmin, FMORENOADMIN, frank, base64 encode php, frank moreno, a moreno, frank martin, moreno a, eurorenting, base64_encode php, base64 php, Frank Moreno, Moreno Alburqueque, Frank Martin, Martin Moreno, Frank Moreno Alburqueque, Frank Alburqueque, Sistema Songoku" />
	<meta name="generator" content="FMORENOADMIN" />
	<meta name="author" content="Moreno Alburqueque Frank Martin, admin@fmorenoadmin.com.pe" />
	<meta name="urlauthor" content="https://www.fmorenoadmin.com.pe" />
	<meta name="copyright" content="Copyright © 2018 - <?= date('Y'); ?> Frank Martin Moreno Alburqueque" />
	<meta name="og:title" content="<?= $pagina; ?>" />
	<meta name="og:site_name" content="Frank Moreno Alburqueque" />
	<!-- other -->
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
						<a href="<?= URL; ?>" class="nav-link active" aria-current="page">Generador de URL y QR para Campañas y Publicidad</a>
					</li>
					<li class="nav-item">
						<a href="<?= URL; ?>lista/" class="nav-link" aria-current="page">Ver QRs Generados</a>
					</li>
					<li class="nav-item">
						<a href="<?= URL; ?>Control_de_Publicidad.xlsx" class="nav-link" aria-current="page">Formato EXCEL para el control de Publicidad</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!---->
	<div class="container-fluid" style="overflow: auto; margin-bottom: 120px;">
		<div class="accordion row" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
					<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Generar la URL
					</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<div class="card col-sm-12">
							<div class="card-header">
								<h3 class="card-title">1.- Ingrese datos para generar la URL</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-10" title="este valor se puede ingresar de varias formas: https://www.dominio.ext/ https://dominio.ext/ www.dominio.ext http://www.dominio.ext/ dominio.ext">
										<div class="form-group">
											<label class="form-control-label">Dominio:</label>
											<input type="url" id="dominio" class="form-control" list="dominios" pattern="^https:\/\/www\.[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+\/$" />
											<datalist id="dominios">
												<option value="<?= FMMA; ?>">
												<option value="https://www.frankmorenoalburqueque.com/">
												<option value="https://www.corazones.com.pe/">
												<option value="https://www.roomie.com.pe/">
												<option value="https://www.3rcore.com/">
												<option value="https://www.stilodent.pe/">
												<option value="https://www.cocogarage.com.pe/">
												<option value="https://www.coolturaburger.com.pe/">
												<option value="https://www.daska.pe/">
												<option value="https://www.etis.com.pe/">
												<option value="https://www.fibramet.pe/">
												<option value="https://www.geoingenieros.com.pe/">
												<option value="https://www.grupomarcela.com.pe/">
												<option value="https://www.lumiser.pe/">
												<option value="https://www.viajesudamerican.com.pe/">
												<option value="https://www.belshop.com.pe/">
												<option value="https://www.campoysol.pe/">
												<option value="https://www.linxs.com.pe/">
												<option value="https://www.pegaso-cni.com.pe/">
												<option value="https://www.realtyhouse.pe/">
												<option value="https://www.prospercont.pe/">
												<option value="https://www.ser.pe/">
												<option value="https://eurorenting.com.pe/">
												<option value="https://www.facebook.com/">
												<option value="https://www.instagram.com/">
												<option value="https://www.tiktok.com/@">
												<option value="https://www.twitter.com/">
												<option value="https://www.linkedin.com/company/">
												<!--<option value="https://www./">-->
											</datalist>
										</div>
									</div>
									<div class="col-sm-2" title="Este parámetro está destinado para las palabras clave">
										<div class="form-group">
											<label class="form-control-label">Agregar www a URL</label>
											<select id="viewwww" class="form-control">
												<option value="1">SI</option>
												<option value="2">NO</option>
											</select>
										</div>
									</div>
									<div class="col-sm-4" title="ID de la campaña de google">
										<div class="form-group">
											<label class="form-control-label">UTM ID:</label>
											<input type="text" id="id" class="form-control" />
										</div>
									</div>
									<div class="col-sm-4" title="Es la fuente desde la que viene ese tráfico">
										<div class="form-group">
											<label class="form-control-label">UTM SOURCE: (requerido)</label>
											<input type="text" id="source" class="form-control" list="sources" />
											<datalist id="sources">
												<option value="whatsapp">
												<option value="facebook">
												<option value="instagram">
												<option value="tiktok">
												<option value="web">
												<option value="calular">
												<option value="correo">
											</datalist>
										</div>
									</div>
									<div class="col-sm-4" title="Este parámetro indica el medio desde el que proviene el tráfico">
										<div class="form-group">
											<label class="form-control-label">UTM MEDIUM: (requerido)</label>
											<input type="text" id="medium" class="form-control" list="mediums" />
											<datalist id="mediums">
												<option value="Directo">
												<option value="Búsqueda orgánica">
												<option value="Correo electrónico">
												<option value="Afiliado">
												<option value="Referencia">
												<option value="Publicidad">
												<option value="Otra publicidad">
												<option value="Display">
												<option value="social">
											</datalist>
										</div>
									</div>
									<div class="col-sm-6" title="Poniendo este parámetro UTM, puedes agregar el nombre de la campaña.">
										<div class="form-group">
											<label class="form-control-label">UTM CAMPAIGN: (requerido)</label>
											<input type="text" id="campaign" class="form-control" />
										</div>
									</div>
									<div class="col-sm-6" title="Puedes usar este parámetro en caso de que quieras saber qué contenido tenía el link que publicaste. Por ejemplo, supongamos que tienes una campaña de banners, y cada banner tiene contenido diferente. Puedes utilizar este parámetro para distinguir de qué banner llega cada visitante, y por ende, cuál funciona mejor.">
										<div class="form-group">
											<label class="form-control-label">UTM CONTENT:</label>
											<input type="text" id="content" class="form-control" />
										</div>
									</div>
									<div class="col-sm-8" title="Este parámetro está destinado para las palabras clave">
										<div class="form-group">
											<label class="form-control-label">UTM TERM: (Separe siempre con coma ,)</label>
											<input type="text" id="term" class="form-control" placeholder="palabla1, palabla2, palabla3" />
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label class="form-control-label">Ver Web o Usuario</label>
											<select id="viewport" class="form-control">
												<option value="1">SI</option>
												<option value="2">NO</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group">
											<label class="form-control-label">Tamaño del QR</label>
											<select id="medida" class="form-control">
												<option value="100">Pequeño</option>
												<option value="300" selected="true">Mediano</option>
												<option value="600">Grande</option>
												<option value="900">Extra Grande</option>
											</select>
										</div>
									</div>
									<div class="col-sm-12" title="Este parámetro está destinado para las palabras clave">
										<div class="form-group">
											<label class="form-control-label">Parámetros específicos al final de la URL: (Combinados siempre con &)</label>
											<input type="text" id="parms" class="form-control" placeholder="?clave1=valor1&clave2=valor2&cave3=valor3" />
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-success btn-group btn-block" id="generar">Generar URL</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						Copiar el enlace y ver QR
					</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<div class="card col-sm-12">
							<div class="card-header">
								<h3 class="card-title">2.- Copiar el enlace y Ver QR generado</h3>
							</div>
							<div class="card-body">
								<code id="resultado" class="col-sm-12" style="min-height: 250px; height: auto;"></code>
								<hr class="p-2 m-2">
								<a id="link_href" href="<?= FMMA; ?>assets/images/ico490x458.webp" target="_blank">
									<img id="img_qr" src="<?= FMMA; ?>assets/images/ico490x458.webp" class="img-fluid img-thumbnail card-img figure-img" style="max-height: 400px; max-width: 400px;" alt="">
								</a>
							</div>
							<div class="card-footer">
								<div class="row">
									<button id="regresar" class="btn btn-danger btn-block col-sm-6">Volver al generador</button>
									<button id="copiar" class="btn btn-success btn-block col-sm-6">Copiar la URL al portapapeles</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Crear QR - Proveedor Externo
					</button>
				</h2>
				<div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<div class="card col-sm-12">
							<div class="card-header">
								<h3 class="card-title">Crear QR - Proveedor Externo</h3>
							</div>
							<div class="card-body">
								<embed src="https://www.codigos-qr.com/generador-de-codigos-qr/" class="col-sm-12" style="height: 950px;"></embed>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	<!---->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<!---->
	<script type="text/javascript">
		function copiarAlPortapapeles(texto) {
			var elementoTemp = $("<textarea>");
			$("body").append(elementoTemp);
			elementoTemp.val(texto).select();
			document.execCommand("copy");
			elementoTemp.remove();
		}
		//---------------------
		$(document).ready(function() {
			$('#generar').click(function() {
				var dominio	= $( "#dominio" ).val();
				var id	= $( "#id" ).val();
				var source	= $( "#source" ).val();
				var medium	= $( "#medium" ).val();
				var campaign	= $( "#campaign" ).val();
				var content	= $( "#content" ).val();
				var term	= $( "#term" ).val();
				var viewwww	= $( "#viewwww" ).val();
				var viewport	= $( "#viewport" ).val();
				var medida	= $( "#medida" ).val();
				var parms	= $( "#parms" ).val();
				//--------------------
				$.ajax({
					url: "./ACTIONVQ/url.php",
					method: "POST",
					data: { 
						get: 	true,
						dominio: 	dominio,
						id: 	id,
						source: 	source,
						medium: 	medium,
						campaign: 	campaign,
						content: 	content,
						term: 	term,
						viewwww: 	viewwww,
						viewport: 	viewport,
						medida: 	medida,
						parms: 	parms
					}, // Datos a enviar en la solicitud POST
					success: function(resp){
						if (resp.result) {
							$( "#resultado" ).html(resp.url);
							$( "#img_qr" ).attr('src', resp.qr_src);
							$( "#link_href" ).attr('href', resp.qr_src);
						}
						//--------------
						$("#collapseOne").hide();
						$("#collapseTwo").show();
					},
					error: function(xhr, status, error) {
						// Manejar errores de la solicitud
						console.log(error);
					}
				});
				//--------------------
				return false;
			});
			$('#regresar').click(function() {
				$("#collapseOne").show();
				$("#collapseTwo").hide();
				//--------------------
				return false;
			});
			//---------------------
			$("#copiar").click(function() {
				var contenido = $("#resultado").text(); // Obtener el contenido del elemento <code>
				copiarAlPortapapeles(contenido); // Llamar a la función para copiar al portapapeles
			});
		});
	</script>
</body>
</html>