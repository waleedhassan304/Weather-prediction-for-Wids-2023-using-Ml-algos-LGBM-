<?php
class myDB{

  public $con;
  private static $instance;
  protected $HOST=NULL;
  protected $USER=NULL;
  protected $PASS=NULL;
  protected $DBS=NULL;

  public function __construct($user, $pwd, $dbs, $host='localhost'){

	$this->HOST = $host;
	$this->USER = $user;     $this->PASS = $pwd;     $this->DBS = $dbs;

	 try{
       $this->con = new PDO("mysql:host=".$this->HOST.";dbname=".$this->DBS, $this->USER, $this->PASS);
	   $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);
     }catch(PDOException $e){
	   $this->con = NULL;
       print "Error!: " . $e->getMessage() . "<br/>";
     }

  }


  public function getObj(){

	return $this->con;

  }


  /*
  public function showCred(){

    echo "U: " . $this->USER; echo " <br>";
	echo "P: " . $this->PASS; echo " <br>";
	echo "D: " . $this->DBS;  echo " <br>";

  }
  */


  /*
  public static function getObjInst(){

	  if( !isset(self::$instance) ){
		$object = __CLASS__;
		self::$instance = new $object();
	  }
	  return self::$instance;

  }
  */


}

?>