<?php
require_once("../model/matricula.php");
header("content-Type: application/json");


$data = json_decode(file_get_contents("php://input"));

switch ($data->operacion) {
    case "BuscarTodosMatriculas":
        $matriculaModel = new matricula();
        //print_r($ProductoModel->buscarTodos());
        $resultado = $matriculaModel->buscarTodosMatricula();
        foreach ($resultado as $fila) {
            echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td><button class='btn btn-danger' onclick='aprobar($fila[0]);'>Aprobar</button></td><td><button class='btn btn-success' onclick='denegar($fila[0]);'>Denegar</button></td></tr>";
        }
        break;

    case "solicitar":
        $matriculaModel = new matricula();
        $matriculaModel->setID($data->id);
        $resultado = $matriculaModel->solicitar();
        break;

    case "aprobar":
        $matriculaModel = new matricula();
        $matriculaModel->setID($data->id);
        $resultado = $matriculaModel->aprobar();
        break;

    case "denegar":
        $matriculaModel = new matricula();
        $matriculaModel->setID($data->id);
        $resultado = $matriculaModel->denegar();
        break;



        /*
            $ProductoModel = new ProductoModel();   
            $ProductoModel->setID($data->id);      
            $ProductoModel->eliminarProducto();
            break;
            */
}
