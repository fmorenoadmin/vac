<!-- jQuery -->
<script src="<?= PLUG; ?>jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= PLUG; ?>jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="<?= PLUG; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQVMap -->
<script src="<?= PLUG; ?>jqvmap/jquery.vmap.min.js"></script>
<script src="<?= PLUG; ?>jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= PLUG; ?>jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= PLUG; ?>moment/moment.min.js"></script>
<script src="<?= PLUG; ?>daterangepicker/daterangepicker.js"></script>
<script src="<?= PLUG; ?>inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= PLUG; ?>tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= PLUG; ?>summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= PLUG; ?>overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Select2 -->
<script src="<?= PLUG; ?>select2/js/select2.full.min.js"></script>
<!-- Toastr -->
<script src="<?= PLUG; ?>toastr/toastr.min.js"></script>
<script src="<?= PLUG; ?>bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Sweealert -->
<script src="<?= PLUG; ?>sweetalert2/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- page script -->
<script type="text/javascript">
	let time_load = 90000;
	//--------------------------------------
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2({
			theme: 'bootstrap4'
		});
		//Timepicker
		$('#timepicker').datetimepicker({
			format: 'HH:mm:ss',
			dropdown: true,
			scrollbar: true
		});
	});
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
	$( "form" ).submit(function( event ) {
		loadBottomClick();
	});
	$( "a" ).click(function( event ) {
		var clase = $(this).attr('class');
		console.log(clase);
		//-------------------------------------
		if (
			clase=='nav-link' || 
			clase=='dropdown-toggle' || 
			clase=='nav-link dropdown-toggle' || 
			clase=='dropdown-item dropdown-toggle'
		) {
		}else{
			loadBottomClick();
		}
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