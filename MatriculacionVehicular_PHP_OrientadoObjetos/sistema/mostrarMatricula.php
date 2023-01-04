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
	<title>Lista de matriculas</title>
</head>
<body onload="buscarMatriculas();">
	<?php include "includes/header.php"; ?>
	<section id="container">
		
		<h1>Lista de matriculas</h1>
		
		<table>
        <thead>
                <tr>
                    
                    <th scope="col">Fecha</th>
                    <th scope="col">Vehiculo</th>
                    <th scope="col">Agencia</th>
                    <th scope="col">Año</th>
                    <th scope="col">Status</th>
					<th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody id="datos2">

            </tbody>
		</table>

				
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>