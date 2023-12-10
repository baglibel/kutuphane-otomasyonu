<?php
class DatabaseConnection
{
    //database configs
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "library";

    public $conn;
    
    public function __construct()
    {
        try {
            $conn = new mysqli(
                $this->hostname,
                $this->username,
                $this->password,
                $this->database
            );
            $this->conn = $conn;
        } catch (Exception $e) {
            die("Veritabanına bağlanılamadı. Hata: " . $e->getMessage());
        }
    }
}
?>
