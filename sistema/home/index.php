<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------
	$rut='../';
	//---------------------------------
	$pagina='Inicio';
	$action='index.php';
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
		//require_once($rut2.DIRACT.$action);
		//$data = index($rut2,$location);
		//---------------------------------
		//if (isset($data->inf)) {
		//	$inf = $data->inf;
		//}else{
		//	header("Location: ".$rut);
		//	exit();
		//}
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
			<br>
			<?= __DIRIMG__; ?>
		</div>

		<hr>
		
		<div class="row">
			<div class="col-sm-3">
			</div>
			<div class="col-sm-6 text-center">
				<h2>Bienvenido al sistema: <?= $una; ?></h2>
			</div>
			<div class="col-sm-3 text-right">
			</div>
		</div>

		<?php include_once($rut.CONF.'0error.php'); ?>

		<hr>

		<div class="row pb-5">
			<div class="col-sm-12">
			</div>
		</div>
	</div>
	<?php require_once($rut.CONF.'2java.php'); ?>
	<?php require_once($rut.CONF.'3toastr.php'); ?>
</body>
</html>
<?php
	if (isset($_SESSION['Mysqli_Error'])) { unset($_SESSION['Mysqli_Error']); }
	if (isset($_SESSION['stat'])) { unset($_SESSION['stat']); }
	if (isset($_SESSION['sql'])) { unset($_SESSION['sql']); }