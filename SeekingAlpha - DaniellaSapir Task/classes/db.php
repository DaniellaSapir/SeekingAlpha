<?php
class DB {
    static public $instance = null;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public  $conn;
        
    static function connectToDB() {
        if (self::$instance == null) {
            self::$instance = new DB();
        }
        return self::$instance;
    }
    private function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "seekingalpha";
        // Create connection
        $this->conn = new mysqli(
                $this->servername, $this->username, $this->password, $this->dbname
        );
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
     }
    
    public static function query($sql) {
        // Test if query succeeded
        if (!$sql) {
            echo "Error: No sql found" . $sql;
            exit();
        }
        
        $rs =  mysqli_query(self::connectToDB()->conn, $sql);
        //var_dump(mysqli_error(self::connectToDB()->conn));

        return $rs;
    }
//    to avoid SQL injection we define an escape function like h or u
    public static function escape($value) {
        return mysqli_escape_string(self::connectToDB()->conn, $value);
    }
    
    //CTRL+P gives syntax whats required
    public static function error() {
        if($error = mysqli_error(self::connectToDB()->conn)) {
            return $error;
        }
    }
    
    public function __destruct() {
//        "con close";
        mysqli_close($this->conn);
    }
    
   
    
}