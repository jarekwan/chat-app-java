<?php



class Database{
 

    private $host = "localhost";
    private $db_name = "shop_cart_sessions_1";
    private $username = "root";
    private $password = "";
    public $conn;



    public function getConnection(){

 
        $this->conn = null;

 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Bład połaczenia: " . $exception->getMessage();
        }
 
        return $this->conn;
    }

}
?>