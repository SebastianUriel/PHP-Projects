<?php
	class  Db{
        
		protected $servername = "localhost";
        private $username = "root";
        private $password = "sebas43";
        private $dbname = "biblioteca";
        private static $conn = NULL;
        
        private function __construct (){}
        
        public static function conectar(){
            try {
                $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
			    self::$conn= new PDO("mysql:host=localhost;dbname=biblioteca", "root", "sebas43",$pdo_options);
			    return self::$conn;
            } catch(PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
        public static function cerrar(){
            self::$conn = NULL;
        }
        
	} 
?>