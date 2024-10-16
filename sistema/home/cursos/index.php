<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------
	$rut='../../';
	//---------------------------------
	$pagina='Cursos';$singlr='Curso';
	$action='cursos.php';
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
		require_once($rut.DIRACT.$action);//VISTA INVOCA A LA ACCION
		$data = index($rut,$uid,$rid,$location,$pag);
		//---------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}else{
			header("Location: ".$rut);
			exit();
		}
		//---------------------------------
		require_once($rut.CONF.'0mens.php');
	?>
</head>
<body>
	<?php include_once($rut.CONF.'nav.php'); ?>

	<div class="container">
		<div class="row pb-5" style="display: none;">
			<br>
			<?= $location; ?>
		</div>

		<hr>
		
		<div class="row">
			<div class="col-sm-3">
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Acciones
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="<?= XCEL; ?>?cls=<?= substr($action, 0, -4); ?>">Exportar Excel <i class="fa fa-file-excel-o"></i></a>
					<a class="dropdown-item" href="<?= PDFS; ?>?cls=<?= substr($action, 0, -4); ?>">Exportar PDF <i class="fa fa-file-pdf-o"></i></a>
					<!--<a class="dropdown-item" href="#">Something else here</a>-->
					</div>
				</div>
			</div>
			<div class="col-sm-6 text-center">
				<h2>Lista de <?= $pagina; ?></h2>
			</div>
			<div class="col-sm-3 text-right">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Nuevo <?= substr($pagina, 0, -1); ?> <i class="fa fa-plus"></i></button>
			</div>
		</div>

		<?php include_once($rut.CONF.'0error.php'); ?>

		<hr>

		<div class="row pb-5">
			<div class="col-sm-12">
				<div class="container-fluid">
					<div class="d-flex">
						<input class="form-control me-2 light-table-filter" id="val" type="text" placeholder="Buscar:">
						<button type="button" id="btn_busq" class="btn btn-info"><i class="fa fa-search"></i></button>
						<a href="<?= $location; ?>" class="btn btn-danger"><i class="fa fa-eraser"></i></a>
					</div>
				</div>
				<hr>
				<div id="div1" class="col-sm-12">
					<table id="tblDatos" class="table table-hover">
						<?= $inf->inf; $inf->inf=null; ?>
					</table>
				</div>
				<div id="pagination" aria-label="navigation pagination">
					<?= $data->btns->inf; $data->btns->inf = null; ?>
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
						<h5 class="modal-title" id="exampleModalLabel">Nuevo <?= $singlr; ?></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">Nombre:</label>
									<input type="text" class="form-control" name="nombre" required="required">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="message-text" class="col-form-label">Descripción:</label>
									<textarea class="form-control ckeditor" id="ckeditor" name="descrip"></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label for="recipient-name" class="col-form-label">Foto:</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="customFile" name="imagen">
										<label class="custom-file-label" for="customFile">Seleccione foto</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="uid" value="<?= base64_encode($uid); ?>" />
						<input type="hidden" name="sid" value="<?= base64_encode($sid); ?>" />
						<input type="hidden" name="url" value="<?= base64_encode($location); ?>" />
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" name="nuevo" class="btn btn-primary">Guardar <?= $singlr; ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
	if (isset($_SESSION['sql'])) { unset($_SESSION['sql']); }