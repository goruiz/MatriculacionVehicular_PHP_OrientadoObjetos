<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<script>
		var directoryUrl = "https://abelosh.com/facturacion";
	</script>
</head>

<body>
	<section id="container">
		<form action="Logica/comprobarUsuario.php" method="post">
			<h3>Iniciar Sesión</h3>
			<img src="img/logo.png" alt="Login" width="200px">

			<input type="text" name="usuario" placeholder="Ingrese su usuario">
			<input type="password" name="clave" placeholder="Ingrese su contraseña">
			<div class="alert"></div>
			<input type="submit" value="INICIAR">
			<div class="create_user">
				<a href="crearUsuariosFuera.php" id="btn_register"> <img src="sistema/img/crearUsuario.png" width="50px" ></a>
			</div>
		</form>
	</section>

</body>

</html>