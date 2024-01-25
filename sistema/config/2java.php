<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Select2 -->
<script src="<?= PLUG; ?>select2/js/select2.full.min.js"></script>
<!-- Toastr -->
<script src="<?= PLUG; ?>toastr/toastr.min.js"></script>
<script src="<?= PLUG; ?>bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Sweealert -->
<script src="<?= PLUG; ?>sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- Toastr -->
<script type="text/javascript">
	$(document).ready( function () {
		$('#table1').DataTable();
	} );
</script>
<script type="text/javascript">
	let time_load = 90000;
	//--------------------------------------
	function loadBottomClick(time_l=0){
		//--------------------------------------
		let timerInterval;
		//--------------------------------------
		if (time_l == 0) {
			time_l = time_load;
		}
		//--------------------------------------
		Swal.fire({
			title: 'Cargando...',
			html: '<i class="fas fa-hourglass-half fa-spin fa-4x"></i><!--Este modal se cerrará automáticamente en <b></b>.-->',
			timer: time_l,
			timerProgressBar: true,
			showConfirmButton: false,
			didOpen: () => {
				Swal.showLoading();
				//const b = Swal.getHtmlContainer().querySelector('b');
				timerInterval = setInterval(() => {
					//b.textContent = Swal.getTimerLeft();
				}, 100);
			},
			willClose: () => {
				clearInterval(timerInterval);
			}
		}).then((result) => {
			if (result.dismiss === Swal.DismissReason.timer) {
				console.log('I was closed by the timer');
			}
		})
	}
	//--------------------------------------
	$(document).ready( function () {
		let busq_type = null;
		//--------------------
		$("#btn_busq").on("click", function() {
			loadBottomClick(900);
			//--------------------
			var val = $("#val").val();
			var busq_type = $("#busq_type").val();
			//--------------------
			$.ajax({
				type: 'POST', // Puedes cambiarlo a 'GET' según tus necesidades
				url: '<?= ACTI.$action; ?>',
				data: {
					busq: true,
					val: val,
					tipo: busq_type,
					url: '<?= base64_encode($location); ?>'
				},
				dataType: 'json',
				success: function (response) {
					// Manejar la respuesta JSON aquí
					console.log(response);
					// Ejemplo de cómo acceder a propiedades específicas de la respuesta
					var resultado = response.result;
					//--------------------
					if (resultado) {
						$("#tblDatos").html(response.inf.inf);
						$("#pagination").html(response.btns.inf);
					}
				},
				error: function (error) {
					// Manejar errores aquí
					console.error('Error:', error);
				}
			});
			//--------------------
			return false;
		});
	});
	//--------------------------------------
	// Mostrar u ocultar el botón dependiendo del desplazamiento
	window.onscroll = function() {
		mostrarOcultarBoton();
	};
	function mostrarOcultarBoton() {
		var botonVolverArriba = document.getElementById("btnVolverArriba");
		if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
			//botonVolverArriba.style.display = "block";
			$("#btnVolverArriba").show();
			$("#btnVolverArriba").css("right", "20px !important");
			$("#btnVolverArriba").css("position", "fixed");
			$("#btnVolverArriba").css("float", "right");
			$("#btnVolverArriba").css("display", "block");
		} else {
			//botonVolverArriba.style.display = "none";
			$("#btnVolverArriba").hide();
			$("#btnVolverArriba").css("display", "none");
			$("#btnVolverArriba").css("position", "");
		}
	}
	// Volver al principio de la página
	function volverArriba() {
		document.body.scrollTop = 0; // Para navegadores Safari
		document.documentElement.scrollTop = 0; // Para otros navegadores
	}
	//--------------------------------------
</script>
<button id="btnVolverArriba" class="btn btn-primary fixed-bottom fixed-right" title="Ir al Principio" style="z-index: 999;bottom: 40px; display: none;" onclick="volverArriba()"><i class="fas fa-angles-up"></i></button>