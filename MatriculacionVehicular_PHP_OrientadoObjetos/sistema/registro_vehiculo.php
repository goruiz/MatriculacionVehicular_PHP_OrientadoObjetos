<?php
session_start();
if ($_SESSION['rol'] != 2) {
	header("location: ./");
}
include "../conexion.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Dar alta vehiculo</title>
</head>

<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<div class="form_register">
			<h1>Nuevo Vehículo</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="../Logica/logica_vehiculo.php" method="post">
				<label for="placa">Placa</label>
				<input type="text" name="placa" id="placa" placeholder="PCQ2794">
				<label for="marca">Marca</label>

				<?php

				$query_marca = mysqli_query($conection, "SELECT * FROM marca");
				$result_marca = mysqli_num_rows($query_marca);

				?>

				<select name="marca" id="marca">
					<?php
					if ($result_marca > 0) {
						while ($marca = mysqli_fetch_array($query_marca)) {
					?>
							<option value="<?php echo $marca["idmarca"]; ?>"><?php echo $marca["marca"] ?></option>
					<?php
							# code...
						}
					}
					?>
				</select>

				<label for="motor">Motor</label>
				<input type="text" name="motor" id="motor" placeholder="800hps">
				<label for="chasis">Chasis</label>
				<input type="text" name="chasis" id="chasis" placeholder="ECU77812UIO">
				<label for="combustible">Combustible</label>
				<input type="text" name="combustible" id="combustible" placeholder="Gasolina">
				<label for="anio">Año</label>
				<input type="text" name="anio" id="anio" placeholder="2022">
				<label for="color">Color</label>
				<?php

				$query_color = mysqli_query($conection, "SELECT * FROM color");
				mysqli_close($conection);
				$result_color = mysqli_num_rows($query_color);

				?>

				<select name="color" id="color">
					<?php
					if ($result_color > 0) {
						while ($color = mysqli_fetch_array($query_color)) {
					?>
							<option value="<?php echo $color["idcolor"]; ?>"><?php echo $color["color"] ?></option>
					<?php
							# code...
						}
					}
					?>
				</select>
				<label for="foto">Foto</label>
				<input type="text" name="foto" id="foto" placeholder="img.png">
				<label for="avaluo">Avaluo</label>
				<input type="text" name="avaluo" id="avaluo" placeholder="100000">
				<input type="submit" value="Alta de vehículo" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>

</html>