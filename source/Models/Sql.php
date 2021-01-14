<?php

namespace Source\Models\DB;

class Sql {

    const DBNAME = "db_ecommerce";
    const HOSTNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";

    private $conn;

    public function __construct(){

        $this->conn = new \PDO("mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME,
        Sql::USERNAME,Sql::PASSWORD);

    }

    private function setParams($statement,$arguments = array()){

        foreach ($arguments as $key => $value) {
            $statement->bindParam($key,$value);
        }

    }

    private function query($rawQuery,$params = array()){

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt,$params);
        $this->stmt->execute();

    }

    private function select($rawQuery,$arguments = array()):array{

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt,$arguments);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }


}