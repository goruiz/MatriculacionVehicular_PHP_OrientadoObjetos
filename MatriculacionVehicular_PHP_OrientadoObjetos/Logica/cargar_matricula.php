<?php
    require_once("../model/Matricula.php");
    //include "../conexion.php";
    header("content-Type: application/json");
    
    $data = json_decode(file_get_contents("php://input"));
    
    switch($data->operacion){
        case "BuscarTodos":

            $matriculaModel = new matricula();
            $resultado = $matriculaModel->buscarMatricula();
            foreach($resultado as $key){
                    $aux1 = $key[2];
                    $aux1 = $matriculaModel->buscarVehiculo($aux1);
                    $key[2] = $aux1[0][1];
                    $aux2 = $key[3];
                    $aux2 = $matriculaModel->buscarAgencia($aux2);
                    $key[3] = $aux2[0][1];
                    //echo $_SESSION["vehiculoID"];
                    echo "</td><td>".$key[1]."</td><td>".$key[2]."</td><td>".$key[3]."</td><td>".$key[4]."</td><td>".$key[5]."</td><td><button class='btn_new' onclick = 'aprobar($key[0]);'> Verificar solicitud </button> </td></tr>";
            }
            break;
            case "Solicitar":
                session_start();
                $_SESSION["agenciaID"] = $data->id;
                $matriculaModel = new matricula();
                $matriculaModel->setVehiculo($_SESSION["vehiculoID"]);
                $matriculaModel->setAgencia($_SESSION["agenciaID"]);
                $fechaActual = date('Y-m-d');
                $anio = date("Y");
                $matriculaModel->setFecha($fechaActual);
                $matriculaModel->setAnio($anio);
                $matriculaModel->setStatus("en proceso");
                $matriculaModel->insertarMatricula();
                
                break;
                case "aprobar":
                    $matriculaModel = new matricula();
                    $matriculaModel->cambiarStatus($data->id);
                    break;
                case "denegar":
                    $matriculaModel = new matricula();
                    $matriculaModel->cambiarStatusDenegado($data->id);
                    break;
            

    }


    
?>