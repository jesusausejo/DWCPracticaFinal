<?php
/**
 * Object executes sql queries
 *
 * @author: http://phpdao.com
 * @date: 27.11.2007
 */
class QueryExecutor{

	/**
	 * Wykonaniew zapytania do bazy
	 *
	 * @param sqlQuery obiekt typu SqlQuery
	 * @return wynik zapytania 
	 */
	public static function execute($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}		
		$query = $sqlQuery->getQuery();
//                $pos = strpos($query, "null");
//                if ($pos != false) {
//                    if(true) {
//                      writeToFile($query);
//                    }
//                }
		$result = $connection->executeQuery($query);
		if(!$result){
			throw new Exception("SQL Error: -->".$query."<--" . mysqli_error($connection->getconection()));
		}
		$i=0;
		$tab = array();
		while ($row = mysqli_fetch_array($result)){
			$tab[$i++] = $row;
		}
		mysqli_free_result($result);
		if(!$transaction){
			$connection->close();
		}
		return $tab;
	}
	
	
	public static function executeUpdate($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}		
		$query = $sqlQuery->getQuery();
		$result = $connection->executeQuery($query);
		if(!$result){
			throw new Exception("SQL Error: -->".$query."<--" . mysql_error());
		}
		return mysqli_affected_rows($connection->getconection());			
	}

	public static function executeInsert($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}		
		QueryExecutor::executeUpdate($sqlQuery);
		return mysqli_insert_id($connection->getconection());
	}
	
	/**
	 * Wykonaniew zapytania do bazy
	 *
	 * @param sqlQuery obiekt typu SqlQuery
	 * @return wynik zapytania 
	 */
	public static function queryForString($sqlQuery){
		$transaction = Transaction::getCurrentTransaction();
		if(!$transaction){
			$connection = new Connection();
		}else{
			$connection = $transaction->getConnection();
		}
		$result = $connection->executeQuery($sqlQuery->getQuery());
		if(!$result){
			throw new Exception("SQL Error: -->".$sqlQuery->getQuery()."<--" . mysqli_error());
		}
		$row = mysqli_fetch_array($connection->getconection(),$result);		
		return $row[0];
	}

}
?>