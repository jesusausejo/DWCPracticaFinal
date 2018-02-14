<?php
/**
 * Class that operate on table 'recibo'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 19:46
 */
class ReciboMySqlDAO implements ReciboDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ReciboMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM recibo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM recibo';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM recibo ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param recibo primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM recibo WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReciboMySql recibo
 	 */
	public function insert($recibo){
		$sql = 'INSERT INTO recibo (idCliente, fecha, Concepto, importe, pagado) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($recibo->idCliente);
		$sqlQuery->set($recibo->fecha);
		$sqlQuery->set($recibo->concepto);
		$sqlQuery->set($recibo->importe);
		$sqlQuery->set($recibo->pagado);

		$id = $this->executeInsert($sqlQuery);	
		$recibo->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReciboMySql recibo
 	 */
	public function update($recibo){
		$sql = 'UPDATE recibo SET idCliente = ?, fecha = ?, Concepto = ?, importe = ?, pagado = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($recibo->idCliente);
		$sqlQuery->set($recibo->fecha);
		$sqlQuery->set($recibo->concepto);
		$sqlQuery->set($recibo->importe);
		$sqlQuery->set($recibo->pagado);

		$sqlQuery->setNumber($recibo->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM recibo';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIdCliente($value){
		$sql = 'SELECT * FROM recibo WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFecha($value){
		$sql = 'SELECT * FROM recibo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByConcepto($value){
		$sql = 'SELECT * FROM recibo WHERE Concepto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByImporte($value){
		$sql = 'SELECT * FROM recibo WHERE importe = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPagado($value){
		$sql = 'SELECT * FROM recibo WHERE pagado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdCliente($value){
		$sql = 'DELETE FROM recibo WHERE idCliente = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFecha($value){
		$sql = 'DELETE FROM recibo WHERE fecha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByConcepto($value){
		$sql = 'DELETE FROM recibo WHERE Concepto = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByImporte($value){
		$sql = 'DELETE FROM recibo WHERE importe = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPagado($value){
		$sql = 'DELETE FROM recibo WHERE pagado = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ReciboMySql 
	 */
	protected function readRow($row){
		$recibo = new Recibo();
		
		$recibo->id = $row['id'];
		$recibo->idCliente = $row['idCliente'];
		$recibo->fecha = $row['fecha'];
		$recibo->concepto = $row['Concepto'];
		$recibo->importe = $row['importe'];
		$recibo->pagado = $row['pagado'];

		return $recibo;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return ReciboMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>