<?php

class Connection
{
    private string $hostname;
    private string $dbname;
    private string $username;
    private string $password;
    private string $port;

    public function __construct($hostname, $dbname, $username = "root", $password = "", $port = "3306")
    {
        $this->hostname = $hostname;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }

    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->hostname};port={$this->port};dbname={$this->dbname};charset=utf8mb4";
        $pdo = new PDO($dsn, $this->username, $this->password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        return $pdo;
    }
}
