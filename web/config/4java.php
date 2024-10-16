<script src="<?= ARCH; ?>js/vendor/jquery-3.2.1.min.js"></script>
<script src="<?= ARCH; ?>js/jquery.slicknav.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="<?= ARCH; ?>js/slick.min.js"></script>
<script src="<?= ARCH; ?>js/fresco.min.js"></script>
<script src="<?= ARCH; ?>js/main.js"></script>
<!-- Toastr -->
<script src="<?= PLUG; ?>toastr/toastr.min.js"></script>
<!-- page script -->
<script type="text/javascript">
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
<button id="btnVolverArriba" class="btn btn-primary fixed-left" title="Ir al Principio" style="z-index: 999;bottom: 40px; display: none;" onclick="volverArriba()"><i class="fas fa-angles-up"></i></button>