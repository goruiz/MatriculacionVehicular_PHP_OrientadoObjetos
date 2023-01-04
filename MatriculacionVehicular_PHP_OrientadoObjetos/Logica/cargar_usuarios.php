<?php
    require_once("../model/usuario.php");
    header("content-Type: application/json");
    
    $data = json_decode(file_get_contents("php://input"));
    
    switch($data->operacion){
        case "BuscarTodosUsuarios":
            $usuarioModel = new usuario();
            //print_r($ProductoModel->buscarTodos());
            $resultado = $usuarioModel->buscarTodosUsuario();
            foreach ($resultado as $fila) {
                echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td><td>$fila[6]</td><td><button class='btn btn-danger' onclick='Eliminar($fila[0]);'>Eliminar</button></td><td><button class='btn btn-success' onclick='Rellenar($fila[0]);'>Editar</button></td></tr>";
            }
            break;
            
       
            /*
            $ProductoModel = new ProductoModel();   
            $ProductoModel->setID($data->id);      
            $ProductoModel->eliminarProducto();
            break;
            */



    }

    
?>