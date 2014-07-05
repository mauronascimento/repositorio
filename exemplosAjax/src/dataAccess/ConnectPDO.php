<?php

namespace src\dataAccess;

use \PDO;
use \Exception;
class ConnectPDO 
{
	private $server = "mysql";
	private $host = "localhost";
	private $dbname = "TESTAJAX";
	private $username = "root";
	private $password = 123456;
	private $connect;

	public function __construct() {
		try{
			$this->connect = new PDO($this->server.":host=".$this->host.";"."dbname=".$this->dbname, $this->username, $this->password);
	
			 $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if(!$this->connect) {
				throw new Exception ("Unable to connect to the database"); 
			}
		}catch (Exception $e){
			echo $e->getMessage();
		}
	}
	public function getConnect() {
		return $this->connect;
	}
}


