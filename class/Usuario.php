<?php
    class Usuario {
        private $idUsuario;
        private $nome;
        private $idade;
       
       

        

        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function setIdUsuario($idUsuario){
             $this->idUsuario = $idUsuario;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
       }
       public function getIdade(){
           return $this->idade;
       }
       public function setIdade($idade){
        $this->idade= $idade;
        }

        public function procurarPeloId($id ){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM cliente WHERE id = :ID", $arrayName = array(':ID' => $id ));

            if(isset($results)){
                $row = $results[0];
                $this->idUsuario = $row['id'];
                $this->nome = $row['nome'];
                $this->idade = $row['idade'];
            }

        }
        public static function listarTodos(){
            $sql = new Sql();
             return $sql->select("SELECT * FROM cliente order by id");
           
        }
        public static function procurar($nome){
            $sql = new Sql();
             return $sql->select("SELECT * FROM cliente WHERE nome like :nome", $params = array(':nome' => "%".$nome."%" ));
           
        }
        //só por questões didaticas.
        public function login($nome, $idade){
            $sql = new Sql();
            $results = $sql->select("SELECT * FROM cliente WHERE nome = :nome AND idade = :idade", $parametros = array(':nome' => $nome, ":idade" => $idade));

            if(count($results) > 0){
                $rows = $results[0]; 
                $this->setNome($rows['nome']);
                $this->setIdade($rows['idade']);
                echo "login efetuado com sucesso.";
            }else{
                throw new Exception('Login ou/e senha invalidos.');
            }
        }
        public function inserir($id, $nome, $idade){
            $sql = new Sql;
            $sql->comandoSql('INSERT INTO cliente (id, nome, idade) values (:id, :nome, :idade)', $params = array(
                ":id" =>$id,
                ":nome"=>$nome,
                ":idade"=>$idade
            ));

        }

        public function modificar($id, $nome, $idade){

            $this->setNome($nome);
            $this->setIdade($idade);
            $this->setIdUsuario($id);
            $sql = new Sql();
            $sql->comandoSql("UPDATE cliente SET  nome = :nome, idade = :idade WHERE id = :id", array(
               ":nome"=>$this->getNome(),
               ":idade"=>$this->getIdade(),
               ":id"=>$this->getIdUsuario()
            ));
        }

        public function excluir($id){
            $this->setIdUsuario($id);
            $sql = new Sql();
            $sql->comandoSql('DELETE FROM cliente WHERE id = :id', array(
                ":id"=>$this->getIdUsuario()
            ));
        }
        public function __toString()
        {
            return json_encode( array(
                ':id' => $this->getIdUsuario(), 
                ':nome' => $this->getNome(), 
                ':idade' => $this->getIdade(), 
            ));
        }
        
    }
?>