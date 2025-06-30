<?php
	$session = session();
	$nombre = $session->get('nombre');
	$apellido = $session->get('apellido');
	$perfil = $session->get('perfil_id');
?>

<header>
	<section class="container-fluid">
		<nav class="navbar navbar-expand-lg bg-body-tertiary rounded-4">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="inicio" style="height: 70px;">
		    	<img class="d-inline-block mw-100 h-100 p-3" src="assets/img/logo2.png">
		    </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" href="inicio" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					    Pagina Principal
					  </a>
					  <ul class="dropdown-menu">
					    <li><a class="dropdown-item" href="inicio">Sobre Nosotros</a></li>
					    <li><a class="dropdown-item" href="inicio#productos">Productos Destacados</a></li>
					    <li><a class="dropdown-item" href="inicio#contacto">Contacto</a></li>
					  </ul>
					</li>

					<li class="nav-item">
					  <a class="nav-link" href="quienes" role="button">
					    Quienes Somos
					  </a>
					</li>

					<li class="nav-item">
					  <a class="nav-link" href="acerca" role="button">
					    Acerca De
					  </a>
					</li>
				</ul>


				<ul class="navbar-nav  mb-2 mb-lg-0">			
				<?php if($perfil == 1): ?>
		    	<!-- NAVBAR PARA ADMINISTRADORES -->	
	        		<li class="nav-item dropstart">
	    	        	<div class="bi nav-item dropdown-toggle" role="button">	
							<a class="nav-link" ><?php echo $nombre . ' ' . $apellido;?></a>
							<svg data-bs-toggle="dropdown" aria-expanded="false" width="32" height="32" fill="currentColor">
								<use xlink:href="assets/icons/bootstrap-icons.svg#person-fill-gear"/>
							</svg>
	    	        	</div>
	        			<ul class="dropdown-menu">
						    <li><hr class="dropdown-divider"></li>
						    <li>
						    	<a class=" dropdown-item nav-link" href="logout" role="button">
									Cerrar Sesión
								</a>
							</li>
						  </ul>
			        </li>
				<?php elseif($perfil == 2 ): ?>
		    	<!-- NAVBAR PARA CLIENTES LOGUEADOS -->
	    	        <li class="nav-item dropstart">	
	    	        	<div class="bi nav-item dropdown-toggle" role="button">	
							<a class="nav-link" ><?php echo $nombre . ' ' . $apellido;?></a>
							<svg data-bs-toggle="dropdown" aria-expanded="false" width="32" height="32" fill="currentColor">
								<use xlink:href="assets/icons/bootstrap-icons.svg#person-fill"/>
							</svg>
	    	        	</div>
	        			<ul class="dropdown-menu">
						    <li><hr class="dropdown-divider"></li>
						    <li>
						    	<a class=" dropdown-item nav-link" href="logout" role="button">
									Cerrar Sesión
								</a>
							</li>
						  </ul>
			        </li>
				<?php else:?>
				<!-- NAVBAR SIN SESIÓN -->		
			        <li class="nav-item">
					  <a class="nav-link" href="registro" role="button">
					    Registrarse
					  </a>
					</li>

					<li class="nav-item">
					  <a class="nav-link" href="login" role="button">
					    Iniciar Sesión
					  </a>
					</li>
			     <?php endif;?>	    
				</ul>

				<form class="d-flex" role="search">
			        <input type="search" class="form-control me-2" aria-label="Busqueda en el sitio" aria-describedby="boton-busqueda">
					  <button class="btn btn-outline-secondary" type="submit" id="boton-busqueda">
					  	<svg class="bi" width="16" height="16" fill="currentColor">
							<use xlink:href="assets/icons/bootstrap-icons.svg#search"/>
						</svg>
					  </button>
				</form>
		    </div>
		  </div>
		</nav>
	</section>
</header>