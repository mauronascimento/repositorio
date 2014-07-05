<?php
namespace src\dataAccess;
use src\dataAccess\ConnectPDO;
use \EXCEPTION;
use \PDO;
class DataAccess 
{
	private $pdo;

    
	public function __construct() {
		
		$this->pdo = new ConnectPDO();
	}

	public function getAll($carrega) {
		try{
			if(isset($carrega) && $carrega == "TRUE") {
				
				$statement = $this->pdo->getConnect()->query("SELECT iso3,nome FROM dados_paises ORDER BY nome ASC");
				$result = self::processResults($statement);
				foreach ($result AS $key => $value) {
					echo "<option value=".$key.">".$value."</option>";
				}
			
			}elseif($carrega == "estados"){
				$statement = $this->pdo->getConnect()->query("SELECT iso3, nome FROM dados_estados");
					$result = self::processResults($statement);
					//print_r($result); die;
					foreach ($result as $key => $value) {
						echo "<option value=".$key.">".$value."</option>";
					}
			}
			else {
				throw new Exception ("An error occurred in the transation");
			}
		}catch(Exception $e) {
			return $e->getMessage();
		}
		


	}
	private function processResults($statement) {
    	$results = array();
         if($statement) {
         	$i = 0;
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
               $results[$row->iso3."_".$i] = utf8_encode($row->nome);
               $i++;
            }
        }
 
        return $results;
    }
}

