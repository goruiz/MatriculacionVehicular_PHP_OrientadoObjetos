<?php 
	session_start();
	if($_SESSION['rol'] != 1)
	{
		//header("location: ./");
	}
	
	include "../config/Database.php";	

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <script src="../js/script.js"></script>
	<?php include "includes/scripts.php"; ?>
	<title>Lista de vehiculos</title>
</head>
<body onload="BuscarTodos();">
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1>Lista de vehiculos</h1>
		<a href="registro_vehiculo.php" class="btn_new">Registrar nuevo vehiculo</a>
		
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
        <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PLACA</th>
                    <th scope="col">MARCA</th>
                    <th scope="col">MOTOR</th>
                    <th scope="col">CHASIS</th>
                    <th scope="col">COMBUSTIBLE</th>
                    <th scope="col">AÑO</th>
                    <th scope="col">COLOR</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">AVALUO</th>
                </tr>
            </thead>
            <tbody id="datos">

            </tbody>
		</table>

	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>