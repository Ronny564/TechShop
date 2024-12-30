<?php
    class Connection{
        private $hostname;
        private $dbname;
        private $username;
        private $password;

        function __construct($hostname,$dbname,$username="root",$password="")
        {
            $this->hostname = $hostname;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password; 
        }
        function getConnection(){
            try {
                    $pdo= new PDO("mysql:host=$this->hostname;dbname=$this->dbname;",$this->username,$this->password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    return $pdo;
            }catch(Exception $error) {
                echo $error->getMessage();
            }
        }
    }
?>  