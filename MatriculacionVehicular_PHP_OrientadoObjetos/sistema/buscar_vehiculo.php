<?php
session_start();
if ($_SESSION['rol'] != 1) {
    // header("location: ./");
}

include "../conexion.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
    <title>Lista de vehiculos</title>
</head>

<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        <?php

        $busqueda = strtolower($_REQUEST['busqueda']);
        if (empty($busqueda)) {
            header("location: mostrarVehiculos.php");
            mysqli_close($conection);
        }


        ?>

        <h1>Lista de vehiculos</h1>
        <a href="nuevoVehiculo.php" class="btn_new">Nuevo vehiculo</a>

        <form action="buscar_vehiculo.php" method="get" class="form_search">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
            <input type="submit" value="Buscar" class="btn_search">
        </form>

        <table>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Motor</th>
                <th>Chasis</th>
                <th>Combustible</th>
                <th>Año</th>
                <th>Color</th>
                <th>Foto</th>
                <th>Avaluo</th>
            </tr>
            <?php
            //Paginador
            $rol = '';
            if ($busqueda == 'administrador') {
                $rol = " OR rol LIKE '%1%' ";
            } else if ($busqueda == 'supervisor') {

                $rol = " OR rol LIKE '%2%' ";
            } else if ($busqueda == 'vendedor') {

                $rol = " OR rol LIKE '%3%' ";
            }


            $sql_registe = mysqli_query($conection, "SELECT COUNT(*) as total_registro FROM vehiculo 
																WHERE ( id LIKE '%$busqueda%' OR 
																		placa LIKE '%$busqueda%' OR 
																		marca LIKE '%$busqueda%' OR 
																		motor LIKE '%$busqueda%' OR
                                                                        chasis LIKE '%$busqueda%' OR
                                                                        combustible LIKE '%$busqueda%' OR
                                                                        anio LIKE '%$busqueda%' OR
                                                                        color LIKE '%$busqueda%' OR
                                                                        foto LIKE '%$busqueda%' OR
                                                                        avaluo LIKE '%$busqueda%'
																		 )  ");

            $result_register = mysqli_fetch_array($sql_registe);
            $total_registro = $result_register['total_registro'];

            $por_pagina = 5;

            if (empty($_GET['pagina'])) {
                $pagina = 1;
            } else {
                $pagina = $_GET['pagina'];
            }

            $desde = ($pagina - 1) * $por_pagina;
            $total_paginas = ceil($total_registro / $por_pagina);

            $query = mysqli_query($conection, "SELECT u.id, u.placa, u.motor, u.chasis, u.combustible, u.anio, u.color, u.foto, u.avaluo FROM vehiculo  
										WHERE 
										( u.id LIKE '%$busqueda%' OR 
											u.placa LIKE '%$busqueda%' OR 
											u.motor LIKE '%$busqueda%' OR 
											u.chasis LIKE '%$busqueda%'  OR
                                            u.combustible LIKE '%$busqueda%' OR 
                                            u.anio LIKE '%$busqueda%' OR 
                                            u.color LIKE '%$busqueda%' OR 
                                            u.foto LIKE '%$busqueda%' OR 
                                            u.avaluo LIKE '%$busqueda%'  )	");
            mysqli_close($conection);
            $result = mysqli_num_rows($query);
            if ($result > 0) {

                while ($data = mysqli_fetch_array($query)) {

            ?>
                    <tr>
                        <td><?php echo $data["id"]; ?></td>
                        <td><?php echo $data["placa"]; ?></td>
                        <td><?php echo $data["motor"]; ?></td>
                        <td><?php echo $data["chais"]; ?></td>
                        <td><?php echo $data["combustible"]; ?></td>
                        <td><?php echo $data["anio"]; ?></td>
                        <td><?php echo $data["color"]; ?></td>
                        <td><?php echo $data["foto"]; ?></td>
                        <td><?php echo $data["avaluo"]; ?></td>


                        <td>




                        </td>
                    </tr>

            <?php
                }
            }
            ?>


        </table>
        <?php

        if ($total_registro != 0) {
        ?>
            <div class="paginador">
                <ul>
                    <?php
                    if ($pagina != 1) {
                    ?>
                        <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda; ?>">|<< /a>
                        </li>
                        <li><a href="?pagina=<?php echo $pagina - 1; ?>&busqueda=<?php echo $busqueda; ?>">
                                <<< /a>
                        </li>
                    <?php
                    }
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        # code...
                        if ($i == $pagina) {
                            echo '<li class="pageSelected">' . $i . '</li>';
                        } else {
                            echo '<li><a href="?pagina=' . $i . '&busqueda=' . $busqueda . '">' . $i . '</a></li>';
                        }
                    }

                    if ($pagina != $total_paginas) {
                    ?>
                        <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                        <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo $busqueda; ?> ">>|</a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>


    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>