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

	public function getAll($carrega, $params = null) {
	
		try{
			if(isset($carrega) && $carrega == "TRUE") {
				
				$statement = $this->pdo->getConnect()->query("SELECT iso3,nome FROM dados_paises ORDER BY nome ASC");
				$result = self::processResults($statement);
				foreach ($result AS $key => $value) {
					echo "<option value=".$key.">".$value."</option>\n";
				}
			
			}elseif($carrega == "estados"){
				$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "_");
				$params = str_replace($array, "", $params);
				$statement = $this->pdo->getConnect()->query("SELECT iso3, nome, uf FROM dados_estados WHERE iso3 = '".$params."'");
				$result = self::processResults($statement);
				if(empty($result)) {
					echo "Desculpe, ainda não cadastramos os estados deste pais";
				}else{
					foreach ($result as $key => $value) {
						echo "<option value=".$key.">".$value."</option>\n";
					}
				}
	

			}elseif($carrega == "cidades"){
				$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "_", "BRA");
				$params = str_replace($array, "", $params);
				$statement = $this->pdo->getConnect()->query("SELECT e.iso3, c.uf, c.nome FROM dados_cidades AS c INNER JOIN
				dados_estados AS e  ON e.uf=c.uf WHERE c.uf = '".$params."'");
				$result = self::processResults($statement);

				if(empty($result)) {
					echo "Desculpe, ainda não cadastramos as cidades deste estado deste pais";
				}else{
					foreach ($result as $key => $value) {
						echo "<option value=".$key.">".$value."</option>\n";
					}
				}
	

			}elseif($carrega == "bairros"){
				$array = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "_", "BRA");
				$params = str_replace($array, "", $params);
				$statement = $this->pdo->getConnect()->query("SELECT e.iso3, c.uf, c.nome FROM dados_cidades AS c INNER JOIN
				dados_estados AS e  ON e.uf=c.uf WHERE c.uf = '".$params."'");
				$result = self::processResults($statement);

				if(empty($result)) {
					echo "Desculpe, ainda não cadastramos as cidades deste estado deste pais";
				}else{
					foreach ($result as $key => $value) {
						echo "<option value=".$key.">".$value."</option>\n";
					}
				}
	

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
         	$i = 0;
            while($row = $statement->fetch(PDO::FETCH_OBJ)) {
               $results[$row->iso3."_".$i."_".(isset($row->uf)? $row->uf : "")] = utf8_encode($row->nome);
               $i++;
            }
        }
 
        return $results;
    }
}

