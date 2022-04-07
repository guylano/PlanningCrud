<?php
class dbh{

	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;
	public $pdo = "";

	public function query($query){
		

		$data = $this->pdo->prepare($query);
		$data->execute();
		$data = $data->fetchAll();
		return $data;
	}

	public function connect(){
		$this->servername = 'byb9bsxqfu2v7oolyjar-mysql.services.clever-cloud.com';
		$this->username = 'uwtf0alhguownvmj';
		$this->password = 'KEKop9SbOvvI5z3edVN6';
		$this->dbname = 'byb9bsxqfu2v7oolyjar';
		$this->charset = 'utf8mb4';


		try {
			$dsn = 'mysql:host='.$this->servername.';dbname='.$this->dbname.';charset='.$this->charset;
			$this->pdo = new PDO($dsn, $this->username, $this->password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "goed"
			return $this->pdo;
		} catch (PDOException $e) {
			echo "fout";
		}

	}


} 

$db = new dbh;
$db->connect();




?>
