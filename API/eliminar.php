<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers:Origin,X-Requested-With, Content-Type, Accept");
$cliente_id=$_POST['id'];
//include all DAO files
require_once('include_dao.php');		
//start new transaction
$transaction = new Transaction();
//obtain clienteDAOFactory
$CLienteDAO=DAOFactory::getClienteDAO();
//obtain clientes
$update=$CLienteDAO->delete($cliente_id);//devuelve el numero de registros afectados en el update
//commit transaction
$transaction->commit();
if( $update>0){
	echo json_encode(array("OK"=>1), JSON_FORCE_OBJECT);
}else{
	echo json_encode(array("error"=>0), JSON_FORCE_OBJECT);
}
?>