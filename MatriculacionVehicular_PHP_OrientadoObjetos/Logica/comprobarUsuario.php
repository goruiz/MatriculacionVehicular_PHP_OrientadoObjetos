<?php 
$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
	header('location: ../sistema/');
}else{

	if(!empty($_POST))
	{
		if(empty($_POST['usuario']) || empty($_POST['clave']))
		{
			$alert = 'Verifica tus datos mijin';              
                echo "<SCRIPT>alert('Verifica tus datos mijin');</SCRIPT>";
                echo "<SCRIPT>window.open('../index.php','_self');</SCRIPT>";
               
				session_destroy();
		}else{

			//require_once "../config/Database.php";
            require_once "../conexion.php";

            $user = mysqli_real_escape_string($conection,$_POST['usuario']);
			$pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

			$query = mysqli_query($conection,"SELECT * FROM usuario WHERE usuario= '$user' AND clave = '$pass'");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['user']   = $data['usuario'];
				$_SESSION['rol']    = $data['rol'];

				header('location: ../sistema/');
			}else{
				$alert = 'Verifica tus datos mijin';              
                echo "<SCRIPT>alert('Verifica tus datos mijin');</SCRIPT>";
                echo "<SCRIPT>window.open('../index.php','_self');</SCRIPT>";
               
				session_destroy();
			}


		}

	}
}
 ?>
