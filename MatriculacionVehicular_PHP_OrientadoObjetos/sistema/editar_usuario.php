<?php

session_start();
if ($_SESSION['rol'] != 1) {
	header("location: ./");
}

include "../conexion.php";

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['nombre']) || empty($_POST['usuario'])  || empty($_POST['rol'])) {
		$alert = '<p class="msg_error">Se debe llenar todos los campos</p>';
	} else {

		$idUsuario = $_POST['idUsuario'];
		$nombre = $_POST['nombre'];
		$user   = $_POST['usuario'];
		$clave  = md5($_POST['clave']);
		$rol    = $_POST['rol'];


		$query = mysqli_query($conection, "SELECT * FROM usuario 
													   WHERE (usuario = '$user' AND idusuario != $idUsuario)
													   OR (idusuario != $idUsuario) ");

		$result = mysqli_fetch_array($query);

		

			if (empty($_POST['clave'])) {

				$sql_update = mysqli_query($conection, "UPDATE usuario
															SET nombre = '$nombre', usuario='$user',rol='$rol'
															WHERE idusuario= $idUsuario ");
			} else {
				$sql_update = mysqli_query($conection, "UPDATE usuario
															SET nombre = '$nombre', usuario='$user',clave='$clave', rol='$rol'
															WHERE idusuario= $idUsuario ");
			}

			if ($sql_update) {
				$alert = '<p class="msg_save">Usuario actualizado </p>';
			} else {
				$alert = '<p class="msg_error">Error</p>';
			}
		
	}
}

//Mostrar Datos
if (empty($_REQUEST['id'])) {
	header('Location: mostrarUsuarios.php');
	mysqli_close($conection);
}
$iduser = $_REQUEST['id'];

$sql = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.usuario, (u.rol) as idrol, (r.rol) as rol
									FROM usuario u
									INNER JOIN rol r
									on u.rol = r.idrol
									WHERE idusuario= $iduser ");
mysqli_close($conection);
$result_sql = mysqli_num_rows($sql);

if ($result_sql == 0) {
	header('Location: mostrarUsuarios.php');
} else {
	$option = '';
	while ($data = mysqli_fetch_array($sql)) {
		# code...
		$iduser  = $data['idusuario'];
		$nombre  = $data['nombre'];
		$usuario = $data['usuario'];
		$idrol   = $data['idrol'];
		$rol     = $data['rol'];

		if ($idrol == 1) {
			$option = '<option value="' . $idrol . '" select>' . $rol . '</option>';
		} else if ($idrol == 2) {
			$option = '<option value="' . $idrol . '" select>' . $rol . '</option>';
		} else if ($idrol == 3) {
			$option = '<option value="' . $idrol . '" select>' . $rol . '</option>';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Usuario</title>
</head>

<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<div class="form_register">
			<h1>Actualizar usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?php echo $nombre; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="rol">Tipo Usuario</label>

				<?php
				include "../conexion.php";
				$query_rol = mysqli_query($conection, "SELECT * FROM rol");
				mysqli_close($conection);
				$result_rol = mysqli_num_rows($query_rol);

				?>

				<select name="rol" id="rol" class="notItemOne">
					<?php
					echo $option;
					if ($result_rol > 0) {
						while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["rol"] ?></option>
					<?php
							# code...
						}
					}
					?>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>

</html>