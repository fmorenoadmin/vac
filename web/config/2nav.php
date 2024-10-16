<header class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3 order-2 order-sm-1">
				<div class="header__social">
					<a href="<?= FACE; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="<?= TWIT; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="<?= INST; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
				<a href="<?= URL; ?>" class="site-logo">
					<img src="<?= LOGOF; ?>" alt="" style="max-height: 100px;" />
				</a>
			</div>
			<div class="col-sm-4 col-md-3 order-3 order-sm-3">
				<div class="header__switches">
					<!--<a href="<?= URL; ?>" class="search-switch"><i class="fa fa-search"></i></a>-->
					<a href="<?= URL; ?>" class="nav-switch"><i class="fa fa-bars"></i></a>
					<!--<a href="<?= URL; ?>"><i class="fa fa-shopping-cart"></i></a>-->
				</div>
			</div>
		</div>
		<nav class="main__menu">
			<ul class="nav__menu">
				<li><a href="<?= URL; ?>" <?= (($_pg_na=='documentacion') ? 'class="menu--active"' : NULL); ?>>Documentación</a></li>
				<li><a href="<?= URL; ?>inicio/" <?= (($_pg_na=='index') ? 'class="menu--active"' : NULL); ?> >Inicio</a></li>
				<li><a href="<?= URL; ?>contacto/" <?= (($_pg_na=='contacto') ? 'class="menu--active"' : NULL); ?> >Contacto</a></li>
				<?php if ($_pg_na=='curso_detail'): ?>
					<li><a href="<?= $location; ?>" class="menu--active">Detalle del Curso</a></li>
				<?php endif ?>
				<li>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input name="cmd" type="hidden" value="_s-xclick"/>
						<input name="hosted_button_id" type="hidden" value="KN32TH6DXPUXQ"/>
						<input alt="Donate with PayPal button" border="0" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" title="Convierte tu gratitud en acción: cada donación impulsa la creación de contenido PHP gratuito para todos. Tu apoyo no solo construye repositorios, sino también un puente hacia un mundo de conocimiento compartido. ¡Haz clic en el botón de PayPal y únete a la revolución del código abierto hoy!" type="image"/>
						<img alt="" border="0" height="1" src="https://www.paypal.com/en_PE/i/scr/pixel.gif" width="1"/>
					</form>
				</li>
				<li><a href="https://github.com/fmorenoadmin/vac" target="_blank">GitHub</a></li>
				<li><a href="<?= QR_G; ?>" target="_blank">Generador QR</a></li>
				<li><a href="<?= SIST; ?>" target="_blank">Sistema</a></li>
			</ul>
		</nav>
	</div>
</header>