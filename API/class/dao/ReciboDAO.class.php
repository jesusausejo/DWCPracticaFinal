<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2018-02-13 19:46
 */
interface ReciboDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Recibo 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param recibo primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Recibo recibo
 	 */
	public function insert($recibo);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Recibo recibo
 	 */
	public function update($recibo);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdCliente($value);

	public function queryByFecha($value);

	public function queryByConcepto($value);

	public function queryByImporte($value);

	public function queryByPagado($value);


	public function deleteByIdCliente($value);

	public function deleteByFecha($value);

	public function deleteByConcepto($value);

	public function deleteByImporte($value);

	public function deleteByPagado($value);


}
?>