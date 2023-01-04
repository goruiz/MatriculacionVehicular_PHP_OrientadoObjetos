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
	<title>Lista de usuarios</title>
</head>
<body onload="BuscarTodosUsuarios();">
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1>Lista de Usuarios</h1>
		<a href="registro_usuario.php" class="btn_new">Registrar nuevo usuario</a>
		
		<form action="buscar_usuario.php" method="get" class="form_search">
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>

		<table>
        <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">CORREO</th>
                    <th scope="col">USUARIO</th>
					<th scope="col">CLAVE</th>
                    <th scope="col">ROL</th>
                    <th scope="col">ESTATUS</th>
                  
                </tr>
            </thead>
            <tbody id="datosUsuarios">

            </tbody>
		</table>

	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>