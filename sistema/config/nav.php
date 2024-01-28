<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= HOME; ?>"><img class="img" src="<?= IMG; ?>ico.png" style="max-height: 85px;"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarScroll">
				<ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?= HOME; ?>">Inicio</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Gestión
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?= HOME; ?>tipos_usuarios/">Tipos de Usuarios</a></li>
							<li><a class="dropdown-item" href="<?= HOME; ?>usuarios/">Usuarios</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="<?= HOME; ?>registro/">Registro</a></li>
							<li><a class="dropdown-item" href="<?= HOME; ?>intentos/">Intentos</a></li>
							<li><a class="dropdown-item" href="<?= HOME; ?>ip_block/">Ips Bloqueadas</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="<?= HOME; ?>usuarios/">Permisos</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=""></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href=""></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= HOME; ?>cursos/">Cursos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= HOME; ?>contacto/">Contacto</a>
					</li>
				</ul>
				<DIV class="d-flex" role="search">
					<A class="btn btn-outline-danger" href="<?= ACTI; ?>logout.php">Salir <i class="fas fa-sign-out"></i></A>
				</div>
			</div>
		</div>
	</nav>
</header>