<?php

if (empty($_SESSION['active'])) {
	header('location: ../');
}
?>
<header>
	<div class="header">

		<hr>
		<div class="optionsBar">
			<img src="../img/logo.png" alt="Usuario" width="100px">

			<span class="user"><?php echo "Usuario: " . $_SESSION['user']; ?></span>

			<img class="photouser" src="img/user.png" alt="Usuario">

		</div>
		<div>
			<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
		</div>

	</div>
	<?php include "nav.php"; ?>
	<style>

	</style>
</header>