<?php
session_start();
if ($_SESSION['rol'] != 1) {
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
    <title>Lista de matrículas</title>
</head>

<body onload="BuscarTodosMatriculas();">
    <?php include "includes/header.php"; ?>
    <section id="container">

        <h1>Lista de matrículas</h1>


        <form action="buscar_usuario.php" method="get" class="form_search">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
            <input type="submit" value="Buscar" class="btn_search">
        </form>

        <table>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">VEHICULO</th>
                    <th scope="col">AGENCIA</th>
                    <th scope="col">AÑO</th>
                    <th scope="col">STATUS</th>

                </tr>
            </thead>
            <tbody id="datosMatriculas">

            </tbody>
        </table>

    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>