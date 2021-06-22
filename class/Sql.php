<?php
    class Sql extends PDO{
        private $conn;

        public function __construct(){
            $this->conn = new PDO("mysql:host=localhost;dbname=cadastro1", "root", "");
        }
        public function setParams($stmt, $parametros = array()){
            foreach ($parametros as $key => $value) {
                $this->setParam($stmt, $key, $value);
            }
        }
         public function setParam($stmt, $key, $value){
            $stmt->bindParam($key, $value);
        }
        
        public function comandoSql($sql, $params = array()){
            $stmt = $this->conn->prepare($sql);
            $this->setParams($stmt, $params);
            $stmt->execute();
            return $stmt;
        }

        public function select($query, $params = array()):array{
            $stmt = $this->comandoSql($query, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        



    }
?>