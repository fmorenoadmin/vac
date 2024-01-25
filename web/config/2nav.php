<header class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-md-3 order-2 order-sm-1">
				<div class="header__social">
					<a href="<?= FACE; ?>"><i class="fa fa-facebook"></i></a>
					<a href="<?= TWIT; ?>"><i class="fa fa-twitter"></i></a>
					<a href="<?= INST; ?>"><i class="fa fa-instagram"></i></a>
				</div>
			</div>
			<div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
				<a href="<?= URL; ?>" class="site-logo">
					<img src="<?= LOGOF; ?>" alt="">
				</a>
			</div>
			<div class="col-sm-4 col-md-3 order-3 order-sm-3">
				<div class="header__switches">
					<a href="<?= URL; ?>" class="search-switch"><i class="fa fa-search"></i></a>
					<a href="<?= URL; ?>" class="nav-switch"><i class="fa fa-bars"></i></a>
					<a href="<?= URL; ?>"><i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>
		<nav class="main__menu">
			<ul class="nav__menu">
				<li><a href="<?= URL; ?>" <?= (($_pg_na=='index') ? 'class="menu--active"' : NULL); ?> >Cursos</a></li>
				<li><a href="<?= URL; ?>contacto/" <?= (($_pg_na=='contacto') ? 'class="menu--active"' : NULL); ?> >Contacto</a></li>
				<li><a href="<?= SIST; ?>" target="_blank">Sistema</a></li>
			</ul>
		</nav>
	</div>
</header>