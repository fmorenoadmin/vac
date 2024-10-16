<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------
	$rut='../../../';
	//---------------------------------
	$pagina='Detalle del Contacto';
	$padre='Contacto';
	$action='contacto.php';
	//---------------------------------
	require_once($rut.'config/0code.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $pagina.TIT; ?></title>
	<?php
		require_once($rut.CONF.'1styles.php');
		//---------------------------------
		$data=null;$inf=null;
		//---------------------------------
		require_once($rut.DIRACT.$action);
		$data = detalle($rut,$pid);
		//---------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}else{
			header("Location: ../");
			exit();
		}
		//---------------------------------
		require_once($rut.CONF.'0mens.php');
	?>
</head>
<body>
	<?php include_once($rut.CONF.'nav.php'); ?>

	<div class="container">
		<div class="row pb-5">
			<br>
		</div>

		<hr>
		
		<div class="row">
			<div class="col-sm-3 text-left">
				<a href="../" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Regresar</a>
			</div>
			<div class="col-sm-6 text-center">
				<h2><?= $pagina; ?></h2>
			</div>
			<div class="col-sm-3 text-right">
			</div>
		</div>
		
		<?php include_once($rut.CONF.'0error.php'); ?>
		
		<hr>

		<div class="row">
			<div class="col-sm-4">
				<form class="col-sm-12" method="post" enctype="multipart/form-data" action="<?= ACTI.$action; ?>">
					<div class="card">
						<div class="card-header">
							Información del <?= $padre; ?>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Nombre:</label>
								<label class="form-control"><?= $inf->nombre; ?></label>
							</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label">Correo:</label>
								<label class="form-control"><?= $inf->correo; ?></label>
							</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label">Teléfono:</label>
								<label class="form-control"><?= $inf->telefono; ?></label>
							</div>
							<div class="form-group">
								<div class="card">
									<h4 class="title-card">Mensaje del Cliente:</h4>
									<div class="card-body">
										<?= $inf->mensaje; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6 text-center">
						<h3>Seguimiento al Cliente</h3>
					</div>
					<div class="col-sm-3 text-right">
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Nuevo Seguimiento <i class="fa fa-plus"></i></button>
					</div>
					<hr>
					<div class="col-sm-12">
						<table id="table1" class="table table-hover">
							<?= $data->seg; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="sol-sm-12">
				<hr>
				<div class="row pb-4 mb-4">
					<div class="card bg-danger col-sm-12">
						<div class="card-header text-center">
							<h4 class="text-white">Datos de Seguridad</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">utm_id:</label>
										<input type="text" value="<?= $inf->utm_id; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">utm_campaign:</label>
										<input type="text" value="<?= $inf->utm_campaign; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">utm_source:</label>
										<input type="text" value="<?= $inf->utm_source; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">utm_medium:</label>
										<input type="text" value="<?= $inf->utm_medium; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">utm_content:</label>
										<input type="text" value="<?= $inf->utm_content; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">utm_term:</label>
										<input type="text" value="<?= $inf->utm_term; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">fbclid:</label>
										<input type="text" value="<?= $inf->fbclid; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">gclid:</label>
										<input type="text" value="<?= $inf->gclid; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">IP del Cliente:</label>
										<input type="text" value="<?= $inf->ip_cli; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">Navegador del Cliente:</label>
										<input type="text" value="<?= $inf->nav_cli; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="form-control-label text-white">Sistema O. del Cliente:</label>
										<input type="text" value="<?= $inf->sist_cli; ?>" class="form-control" readonly="readonly" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require_once($rut.CONF.'2java.php'); ?>
	<?php require_once($rut.CONF.'3toastr.php'); ?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="POST" enctype="multipart/form-data" action="<?= ACTI.$action; ?>">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Nuevo Seguimiento</h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="message-text" class="col-form-label">Respuesta:</label>
							<textarea class="form-control ckeditor" id="ckeditor" name="respuesta"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="pid" value="<?= base64_encode($pid); ?>" />
						<input type="hidden" name="uid" value="<?= base64_encode($uid); ?>" />
						<input type="hidden" name="sid" value="<?= base64_encode($sid); ?>" />
						<input type="hidden" name="url" value="<?= base64_encode($location); ?>" />
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" name="addSeg" class="btn btn-primary">Guardar Seguimiento</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="dropSeg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="POST" action="<?= ACTI.$action; ?>">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar <?= substr($pagina, 0, -1); ?></h5>
						<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<p>¿Está seguro de <b>Eliminar la Respuesta: <em><label class="col-form-label" id="lbl_name"></label></em></b>?</p>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="" class="form-control-plaintext">Motivo de Eliminación:</label>
									<textarea name="motivo_drop" class="form-control ckeditor" required="required"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" id="dropid" name="pid" />
						<input type="hidden" name="uid" value="<?= base64_encode($uid); ?>" />
						<input type="hidden" name="sid" value="<?= base64_encode($sid); ?>" />
						<input type="hidden" name="url" value="<?= base64_encode($location); ?>" />
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" name="dropSeg" class="btn btn-primary">Borrar el <?= substr($pagina, 0, -1); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		function dropSeg(datos){
			var infor=datos.split("||");
			/*
			Divide la cadena a array por este caracter: ( || )
				'MQ==||Comunicación||'			cadena que recibe y la divide dentro de un array de la siguiente manera:
				$infor[0] = 'MQ=='				valor 0
				$infor[1] = 'Comunicación'		valor 1
				$infor[2] = ''					valor 2
			*/
			//--------------------------------
			$('#dropid').val(infor[0]);
			$('#lbl_name').html(atob(infor[1]));
		}
	</script>
</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
	if (isset($_SESSION['sql'])) { unset($_SESSION['sql']); }