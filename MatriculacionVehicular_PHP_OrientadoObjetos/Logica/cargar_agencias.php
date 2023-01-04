<?php
    require_once("../model/Agencia.php");
   
    header("content-Type: application/json");
    
    $data = json_decode(file_get_contents("php://input"));
    
    switch($data->operacion){
        case "BuscarTodos":

            $agenciaModel = new agencia();
          
            session_start();
            $resultado = $agenciaModel->buscarAgencias();
            foreach($resultado as $key){
                
                    
                    echo "<tr><td>".$key[0]."</td><td>".$key[1]."</td><td>".$key[2]."</td><td>".$key[3]."</td><td><button class='btn_new' onclick = 'enviarSolicitud($key[0]);'> Registrar </button> </td></tr>";
            }
            break;




    }


    
?>