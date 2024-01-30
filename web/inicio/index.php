<?php
	if(isset($_SESSION)){}else{ session_start(); }
	//---------------------------------------------
	$rut='../';$_pg_na='index';
	//---------------------------------------------
	$pagina='Principal';
	$action='index.php';//contiene el nombre de la acción
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
		//-----------------------------------
		$data = null;$inf=null;
		//-----------------------------------
		require_once($rut.DIRACT.$action);//requiero a mi acción
		$data = index($rut);
		//-----------------------------------
		if (isset($data->inf)) {
			$inf = $data->inf;
		}
	?>
</head>
<body>
	<!-- Header Section -->
		<?php include_once($rut.CONF.'2nav.php'); ?>
	<!-- Header Section end -->

	<!-- Blog Page -->
	<div class="blog__single__page">
		<article class="blog__article">
			<div class="blog__container">
				<div class="blog__header">
					<div class="blog__cata"><?= $pagina; ?></div>
					<h2 class="blog__single__title">¿Que es esta vista?</h2>
				</div>
				<p>
					Esta vista, es el resultado de mi metodología. <br>
					No tarda mucho tiempo en cargar. <br>
					Las vistas solo muestran información ya lista que devuelve la Clase, a la Acción y la Acción a la Vista. <br>
				</p>
				<p>
					<h2>1</h2>
					<code>
						require_once($rut.DIRACT.$action);//requiero a mi acción<br>
						$data = index($rut);//guardo en la variable <b>$data</b>, lo que me devuelva la función <b>index()</b> de la Acción<br>
					</code>
					<hr>
					<h2>2</h2>
					<code>
						function index($rut){<br>
							&nbsp;&nbsp;&nbsp;&nbsp;global $cls;//llama o invoca a la variable para ser usada dentro de la función <br>
							&nbsp;&nbsp;&nbsp;&nbsp;require_once($rut.DIRMOR.$cls['dbs'].'.php');//requiero a mi clase <b>database</b> <br>
							&nbsp;&nbsp;&nbsp;&nbsp;require_once($rut.DIRMOR.$cls['cl1'].'.php');//requiero a mi clase <b>cursos</b> <br>
							&nbsp;&nbsp;&nbsp;&nbsp;$_dbs = new $cls['dbs']();//Instancio mi clase <b>database</b> como <b>$_dbs</b> <br>
							&nbsp;&nbsp;&nbsp;&nbsp;$_cl1 = new $cls['cl1']();//Instancio mi clase <b>cursos</b> como <b>$_cl1</b> <br>
							&nbsp;&nbsp;&nbsp;&nbsp;$data = new stdClass();//Creo un Objeto de tipo <b>stdClass</b> <br>
							&nbsp;&nbsp;&nbsp;&nbsp;//---------------------------------------- <br>
							&nbsp;&nbsp;&nbsp;&nbsp;$data->inf = $_cl1->listar(); <br>
							&nbsp;&nbsp;&nbsp;&nbsp;//guardo en la variable <b>$data->inf</b>, lo que me devuelva la función <b>listar()</b> de la Clase <b>cursos</b> <br>
							&nbsp;&nbsp;&nbsp;&nbsp;//---------------------------------------- <br>
							&nbsp;&nbsp;&nbsp;&nbsp;return $data;//retorno el objeto <b>data</b> a la <b>vista</b> <br>
						}
					</code>
					<hr>
					<h2>3</h2>
					<code>
						function listar(){//Sí existe la variable <b>inf</b> dentro del objeto <b>$data</b><br>
							&nbsp;&nbsp;&nbsp;&nbsp;$fc_query=$this->db_query;$fc_error=$this->db_error;$fc_array=$this->db_array;$fc_object=$this->db_object;<br>
							&nbsp;&nbsp;&nbsp;&nbsp;$fc_assoc=$this->db_assoc;$fc_num_r=$this->db_num_r;$fc_fre_r=$this->db_fre_r;$fc_close=$this->db_close; <br>
							&nbsp;&nbsp;&nbsp;&nbsp;//convierte las funciones de la base de datos en variables <br>
							&nbsp;&nbsp;&nbsp;&nbsp;//--------------------------------------------------------- <br>
							&nbsp;&nbsp;&nbsp;&nbsp;$inf=null;$n=1;//declaro mis variables <br>
							&nbsp;&nbsp;&nbsp;&nbsp;//--------------------------------------------------------- <br>
							&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;div class="hero-slider" style="max-height: 560px !important;"&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sql = "SELECT nombre, imagen FROM ".$this->table." WHERE status=1;";//creo mi sentencia SQL <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$res = $this->db_exec($sql);//ejecuto mi sentencia SQL <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($res->result==true && $res->cant > 0) {//valido si se ejecutó y si hay resultados <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while ($row = $fc_assoc($res->res)) {//recorro las filas del resultado<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;div class="slide-item"&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf.='...';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;/div&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
							&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;/div&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;div class="hero-text-slider" style="max-height: 200px !important;"&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sql = "SELECT nombre FROM ".$this->table." WHERE status=1;";//creo mi sentencia SQL <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$res = $this->db_exec($sql);//ejecuto mi sentencia SQL <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if ($res->result==true && $res->cant > 0) {//valido si se ejecutó y si hay resultados <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;while ($row = $fc_assoc($res->res)) {//recorro las filas del resultado<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;div class="slide-item"&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf.='...';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;/div&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br>
							&nbsp;&nbsp;&nbsp;&nbsp;$inf.='&#60;/div&#62;';<br>
							&nbsp;&nbsp;&nbsp;&nbsp;return $inf;//retorno el <b>código HTML</b> a la <b>Acción</b><br>
						}
					</code>
					<hr>
					<h2>4</h2>
					<code>
						if (isset($data->inf)) {//Sí existe la variable <b>inf</b> dentro del objeto <b>$data</b><br>
							&nbsp;&nbsp;&nbsp;&nbsp;$inf = $data->inf;// guardo el contenido de la varialbe <b>inf</b> del objeto <b>$data</b>, dentro de la variable <b>$inf</b><br>
						}
					</code>
					<hr>
					<h2>5</h2>
					<code>
						&#60;section class="hero__section"&#62; <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&#60;&#63;= $inf; $inf=null; ?&#62;<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&#60;!-- Muestro el contenido de la variable <b>$inf</b> y Limpio el contenido para ahorrar memoria --&#62;<br>
						&#60;&#63;&#47;section&#62;
					</code>
				</p>
			</div>
		</article>
	</div>
	<!-- Blog Page end -->

	<!-- Hero Section -->
	<section class="hero__section">
		<?= $inf; $inf=null; ?>
	</section>
	<!-- Hero Section end -->

	<!-- Footer Section -->
		<?php include_once($rut.CONF.'3footer.php'); ?>
	<!-- Footer Section end -->

	<!--====== Javascripts & Jquery ======-->
		<?php include_once($rut.CONF.'4java.php'); ?>

	</body>
</html>