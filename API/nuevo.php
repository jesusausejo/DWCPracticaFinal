<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Origin,X-Requested-With, Content-Type, Accept");
//require('functions.php');
if(isset($_POST['submit'])){
	//require('clases/cliente.class.php');
	//include all DAO files
	require_once('include_dao.php');
	//new cliente
	$cliente=new Cliente();	
	$cliente->nombres = htmlspecialchars(trim($_POST['nombres']));
	$cliente->ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cliente->sexo = htmlspecialchars(trim($_POST['alternativas']));
	$cliente->telefono = htmlspecialchars(trim($_POST['telefono']));
	$cliente->fechaNacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento']));

	//start new transaction
	$transaction = new Transaction();
	//obtain clienteDAOFactory
	$CLienteDAO=DAOFactory::getClienteDAO();
	//insert cliente
	$id=$CLienteDAO->insert($cliente);
	//commit transaction
	$transaction->commit();
//echo json_encode($clientes, JSON_FORCE_OBJECT);
	//$objCliente=new Cliente;
	if ( $id >0){
    	echo json_encode(array("id"=>$id), JSON_FORCE_OBJECT);
	}else{
		echo json_encode(array("error"=>"Nuevo:Se produjo un error. Intente más tarde"), JSON_FORCE_OBJECT);
	} 

}
?>