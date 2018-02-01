<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Origin,X-Requested-With, Content-Type, Accept");
//require('functions.php');
if(isset($_POST['submit'])){
	//include all DAO files
	require_once('include_dao.php');
	//new cliente
	$cliente=new Cliente();	
	$cliente->id = htmlspecialchars(trim($_POST['cliente_id']));
	$cliente->nombres = htmlspecialchars(trim($_POST['nombres']));
	$cliente->ciudad = htmlspecialchars(trim($_POST['ciudad']));
	$cliente->sexo = htmlspecialchars(trim($_POST['alternativas']));
	$cliente->telefono = htmlspecialchars(trim($_POST['telefono']));
	$cliente->fechaNacimiento = htmlspecialchars(trim($_POST['fecha_nacimiento']));
	//start new transaction
	$transaction = new Transaction();
	//obtain clienteDAOFactory
	$CLienteDAO=DAOFactory::getClienteDAO();
	//update cliente
	$update=$CLienteDAO->update($cliente);
	//commit transaction
	$transaction->commit();
	if ( $update>0){
		//el header location sigue haciendo una peticion al servidor más ya que contesta al cliente y este vuelve a pedir
    //header("location:consulta.php");
    echo json_encode(array("id"=>$cliente->id), JSON_FORCE_OBJECT);
	}else{
		echo json_encode(array("error"=>"Actualizar:Se produjo un error. Intente más tarde"), JSON_FORCE_OBJECT);
		exit();
	} 
}else{
	if(isset($_POST['id'])){
		//include all DAO files
		require_once('include_dao.php');
		//start new transaction
		$transaction = new Transaction();
		//obtain clienteDAOFactory
		$CLienteDAO=DAOFactory::getClienteDAO();
		//update cliente
		$cliente=$CLienteDAO->load($_POST['id']);
		//commit transaction
		$transaction->commit();
		$cls[]=$cliente;
		echo json_encode($cls, JSON_FORCE_OBJECT);
	}
}
?>