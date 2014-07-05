<?php
namespace src\dataAccess;
use src\dataAccess\ConnectPDO;
use \EXCEPTION;

class DataAccess 
{
	private $pdo;

    
	public function __construct() {
		
		$this->pdo = new ConnectPDO();
	}

	public function getAll($carrega) {
		try{
			if(isset($carrega) && $carrega == "TRUE") {
				
				$statement = $this->pdo->getConnect()->query("SELECT * FROM dados_paises ");
				echo"<textarea>";
				print_r(self::processResults($statement));
				echo "</textarea>";
			}else {
				throw new Exception ("An error occurred in the transation");
			}
		}catch(Exception $e) {
			return $e->getMessage();
		}
		


	}
	private function processResults($statement) {
    	$results = array();
         if($statement) {
            while($row = $statement->fetch()) {
               $results[] = $row;
            }
        }
 
        return $results;
    }
}

