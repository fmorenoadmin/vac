<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut='../';
	//---------------------------------------------
	$cod_vers='3.0.12';$txt_vers='Versión Actual';
	$action2 = 'ip_block.php';
	//---------------------------------------------
	require($rut.'config/constant.php');
	//---------------------------------------------
	$data = null;
	//---------------------------------------------
	require_once($rut.DIRACT.$action2);
	$data = sistema($rut);
	//---------------------------------------------
	if ($data->block > 0) {
		header("Location: ".$rut."error/423.shtml");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingresa al sistema antes de continuar</title>
	<?php require_once($rut.CONF.'1styles.php'); ?>
	<link rel="stylesheet" href="<?= PLUG; ?>sweetalert2/sweetalert2.min.css">
	<script src="<?= PLUG; ?>sweetalert2/sweetalert2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<style type="text/css">
	.imagen-fondo {
		background-image: url('<?= IMG; ?>fondologin.jpg');
		background-repeat: none;
		background-size: 100%;
	}
	</style>
</head>
<body class="imagen-fondo">
	<?php require_once($rut.CONF.'3java.php'); ?>
	<script type="text/javascript">
		var _dir_url = '<?php if(isset($_SESSION['_dir_url'])){ echo base64_decode($_SESSION['_dir_url']); }else{ echo "/menu/"; } ?>';
		//-----------------------------------
		Swal.mixin({
			input: 'text',
			inputAttributes: {
				required: 'required',
			},
			showCancelButton: true,
			cancelButtonText: 'Cancelar',
			confirmButtonText: 'Siguiente &rarr;',
			progressSteps: ['1', '2'],
			validationMessage: 'Este campo es requerido',
			backgroundSize: 'cover'
		}).queue([
			{
				title: 'Iniciar sesion',
				html: '<b>Tu session a Terminado.</b><br>Debes volver a ingresar tus credenciales.<br>Se te redirigirá a la última página donde te encontrabas.'
			},
			'Contraseña',
		]).then((result) => {
			if (result.value) {
				var user = result.value[0];
				var pass = result.value[1];
				const answers = JSON.stringify(result.value)
				Swal.fire({
					title: 'Un momento!',
					html: `
					Estamos:
					<pre>Procesando tus credenciales.<br>Para que accedas al sistema.</pre>
					`
				})
				//-----------------------------------
				$.ajax({
					data: {"entrar" : "entrar", "user" : user, "pass" : pass },
					type: "POST",
					dataType: "json",
					url: "<?= $rut.DIRACT; ?>ajax_login.php",
				})
				.done(function( data, textStatus, jqXHR ) {
					//console.log(data);
					if (data==1) {
						window.location = '<?= ((SCHU=='_qas') ? URL_L : URL2); ?>'+_dir_url;
					}else if(data==0){
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Lo sentimos!',
							html: `
								Tus Credenciales son incorrectas:
								<pre>Por seguridad.<br>Este intento de acceso al sistema será ingresado<br>en la base de datos,<br>junto con tu Dirección IP: <b><?= $_SERVER["REMOTE_ADDR"] ?></b>.</pre>
							`
						})
					}
				})
				.fail(function( jqXHR, textStatus, errorThrown ) {
					if ( console && console.log ) {
					console.log( "La solicitud a fallado: " +	textStatus);
					//-----------------------------------
					window.location = '<?= URL; ?>error/';
					}
				}); 
			}else if (result.dismiss === Swal.DismissReason.cancel) {
				window.location = '<?= URL; ?>';
			}
		})
		//-----------------------------------
		var xx = document.getElementsByClassName("swal2-cancel");
		xx.onclick = function(){
			window.location = '<?= URL; ?>';
		};
	</script>
</body>
</html>