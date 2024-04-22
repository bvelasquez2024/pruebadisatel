<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '<li>

				<a href="carpetas">

				<i class="fa fa-folder"></i>
					<span>Carpetas</span>

				</a>

			</li>

			<li>

				<a href="credenciales">

				<i class="fa fa-folder"></i>
					<span>Administrar Credenciales</span>

				</a>

			</li>';

		}

		

	
		?>

		</ul>

	 </section>

</aside>