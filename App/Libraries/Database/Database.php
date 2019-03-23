<?php namespace Library\Database;
use \PDO;
/**
 * First Database Connection in __construct Method
 * Function for Prepare Sql Quries         Called query         
 * Function for Bind All Quries Values     Called bind     
 * Function for Execute Values             Called execute
 * Function for Fetch All Data             Called selectAll
 * Function for Fetch Single Record        called select
 * Function for Count Of Rows              called rowCount
 */
class Database
{

// Database Info
    
    private $user          =  USER;
    private $password      =  PASSWORD;
    private $dbname        =  DBNAME;
    private $host          =  HOST;
    private $database      =  DATABASE;
    private $charset       =  CHARSET;    


// To Work With In All The Class
    private $dbh;
    private $stmt;

// Setup For PDO
    public function __construct()
    {
        try
        {

// DSN Connection

            $dsn      =  $this->database.":host=".$this->host.";dbname=".$this->dbname.";charset=".$this->charset;

            $options  =  [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
            ];
// PDO
            $this->dbh = new PDO($dsn,$this->user,$this->password,$options);

           
            
        }
        catch(PDOException $e)
        {
            die("<h1>FAILED CONNECT TO DATABASE</h1>". $e->getMessage());
        }
    }


// Prepare Database Queries
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }


// Bind All Values
    public function bind($param,$value,$type=null)
    {
        //Check Type of value
        if(is_null($type))
        {
            switch ($value) {
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                    
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                    
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        
        $this->stmt->bindValue($param,$value,$type);
    }
   
// Execute Function
    public function execute(){
        $this->stmt->execute();
    }    
    
// Fetch All Values
    public function selectAll(){
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

// Fetch Single Record
    public function select(){
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

// Row Count
    public function rowCount(){
        return $this->stmt->rowCount();
    }


}