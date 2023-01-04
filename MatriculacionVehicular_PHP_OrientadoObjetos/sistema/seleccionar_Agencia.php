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
	<title>Lista de agencias</title>
</head>
<body onload="cargarAgencias();">
	<?php include "includes/header.php"; ?>
	<section id="container">
		<h1>Lista de agencias</h1>
		<table>
        <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">DIRECCION</th>
                    <th scope="col">TELÉFONO</th>
                </tr>
            </thead>
            <tbody id="datos1">

            </tbody>
		</table>

				
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>