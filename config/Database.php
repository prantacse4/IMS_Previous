<?php 

class Database
{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	public function __construct()
	{
		$this->connectDB();
	}

//db connect fucntion
 	private function connectDB()
	{
		$this->link=new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link)
		{
			$this->error="Connection fail".$this->link->connect_error;
		}
	}

	//read data function
	public function select($query)
	{
		$result=$this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows>0)
		{
			return $result;
		}
		else
		{
			return false;
		}
	}

//insert data fucntion

	public function insert($query)
	{
		$insert_row=$this->link->query($query) or die($this->link->error.__LINE__);
		if ($insert_row) {
			header("Location:category.php?msg=".urlencode('Data inserted Successfully'));
			exit();
		}
		else
		{
			die("Error: (".$this->link->errono.")" .$this->link->error);
		}
	}
//next function

}

?>