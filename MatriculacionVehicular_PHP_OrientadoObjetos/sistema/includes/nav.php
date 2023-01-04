		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<?php
				if ($_SESSION['rol'] == 1) {
				?>
					<li class="principal">
					<li><a href="mostrarUsuarios.php">Detalle de usuarios</a></li>
					<li><a href="mostrarMatricula.php">Matrículas</a></li>
					<li><a href="nuevoUsuario.php">Nuevo Usuario</a></li>

					</li>
				<?php } else {
				?>
					<li class="principal">
					<li><a href="nuevoUsuario.php">Nuevo Usuario</a></li>
					<li><a href="nuevoVehiculo.php">Nuevo vehiculo</a></li>
					<li><a href="mostrarVehiculos.php">Solicitar</a></li>
					</li>


			</ul>
		<?php }

		?>
		</nav>