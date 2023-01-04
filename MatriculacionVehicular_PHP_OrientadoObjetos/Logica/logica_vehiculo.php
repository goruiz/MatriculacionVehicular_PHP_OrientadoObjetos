<?php
require_once("../model/Vehiculo.php");
//header("content-Type: application/json");
session_start();
if ($_SESSION['rol'] != 2) {
	header("location: ./");
}

include "../conexion.php";

if (!empty($_POST)) {
	$alert = '';
	if (empty($_POST['placa']) || empty($_POST['marca']) || empty($_POST['motor']) || empty($_POST['chasis']) || empty($_POST['combustible']) || empty($_POST['anio']) || empty($_POST['color']) || empty($_POST['foto']) || empty($_POST['avaluo'])) {
		$alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
	} else {

		$placa = $_POST['placa'];
		$marca = $_POST['marca'];
		$motor = $_POST['motor'];
		$chasis = $_POST['chasis'];
		$combustible = $_POST['combustible'];
		$anio = $_POST['anio'];
		$color = $_POST['color'];
		$foto = $_POST['foto'];
		$avaluo = $_POST['avaluo'];

		$vehiculoModel = new vehiculo();
		$vehiculoModel->setPlaca($placa);
		$vehiculoModel->setMarca($marca);
		$vehiculoModel->setMotor($motor);
		$vehiculoModel->setChasis($chasis);
		$vehiculoModel->setCombustible($combustible);
		$vehiculoModel->setAnio($anio);
		$vehiculoModel->setColor($color);
		$vehiculoModel->setFoto($foto);
		$vehiculoModel->setAvaluo($avaluo);
		$res = $vehiculoModel->insertarVehiculo();
		echo "<SCRIPT>alert('Auto creado');</SCRIPT>";
		header("location: ../sistema/registro_vehiculo.php");	
		
	}
}
