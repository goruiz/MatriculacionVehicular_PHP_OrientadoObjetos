<?php
session_start();

include "conexion.php";

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])) {
        $alert = '<p class="msg_error">Debes ingresar todos los datos mijin</p>';
    } else {

        $nombre = $_POST['nombre'];
        $user   = $_POST['usuario'];
        $clave  = md5($_POST['clave']);
        $rol    = $_POST['rol'];


        $query = mysqli_query($conection, "SELECT * FROM usuario WHERE usuario = '$user'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<p class="msg_error">Usuario ya existente.</p>';
        } else {

            $query_insert = mysqli_query($conection, "INSERT INTO usuario(nombre,usuario,clave,rol)
																	VALUES('$nombre','$user','$clave','$rol')");
            if ($query_insert) {
                $alert = '<p class="msg_save">Nuevo usuario creado..</p>';
            } else {
                $alert = '<p class="msg_error">Error, verifica los datos mijin</p>';
            }
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php ?>
    <title>Registro Usuario</title>
    <link rel="stylesheet" type="text/css" href="sistema/css/style.css">
    <style>
        body {
            background-color: black;
        }

       
    </style>

</head>

<body>
    <?php // include "sistema/includes/header.php"; 
    ?>
   
        <div class="form_register">
            <div>
                <a href="index.php"><img src="sistema/img/atras.png" width="30px"></a>
            </div>

            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">
                <h1>Crear usuario</h1>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Ingrese su ssuario">
                <label for="clave">Clave</label>
                <input type="password" name="clave" id="clave" placeholder="Ingrese su contraseña">
                <label for="rol">Tipo Usuario</label>

                <?php

                $query_rol = mysqli_query($conection, "SELECT * FROM rol");
                mysqli_close($conection);
                $result_rol = mysqli_num_rows($query_rol);

                ?>

                <select name="rol" id="rol">
                    <?php
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
                <input type="submit" value="Crear usuario" class="btn_save">

            </form>


        </div>


    <?php include "sistema/includes/footer.php"; ?>
</body>

</html>