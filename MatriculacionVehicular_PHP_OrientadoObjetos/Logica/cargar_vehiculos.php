<?php
require_once("../model/Vehiculo.php");
include "../conexion.php";
header("content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

switch ($data->operacion) {
    case "BuscarTodos":

        $vehiculoModel = new vehiculo();

        $resultado = $vehiculoModel->buscarTodos();
        foreach ($resultado as $key) {
            $aux1 = $key[2];
            $aux2 = $vehiculoModel->buscarMarca($aux1);
            $key[2] = $aux2[0][1];
            $aux3 = $vehiculoModel->buscarColor($key[7]);
            $key[7] = $aux3[0][1];

            echo "</td><td>" . $key[1] . "</td><td>" . $key[2] . "</td><td>" . $key[3] . "</td><td>" . $key[4] . "</td><td>" . $key[5] . "</td><td>" . $key[6] . "</td><td>" . $key[7] . "</td><td>" . $key[8] . "</td><td>" . $key[9] . "</td><td><button class='btn_new' onclick = 'solicitar($key[0]);'> Solicitar Matrícula</button> </td></tr>";
        }
        break;
    case "Solicitar":
        session_start();
        $_SESSION["vehiculoID"] = $data->id;
        break;
}
