<?php
	//include all DAO files
	require_once('include_dao.php');
		
	//start new transaction
	$transaction = new Transaction();
	//obtain clienteDAOFactory
	$CLienteDAO=DAOFactory::getClienteDAO();
	//obtain clientes
	$clientes=$CLienteDAO->queryAll();
	//commit transaction
	$transaction->commit();
echo json_encode($clientes/*, JSON_FORCE_OBJECT*/);
?>