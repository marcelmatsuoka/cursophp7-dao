<?php

class Usuario{

    private $idUsuario;
    private $usuario;
    private $senha;
    private $dtCadastro;

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($value){
        $this->idUsuario = $value;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($value){
        $this->usuario = $value;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($value){
        $this->senha = $value;
    }

    public function getDtCadastro(){
        return $this->dtCadastro;
    }

    public function setDtCadastro($value){
        $this->dtCadastro = $value;
    }


    //Metodos
    public function loadById($id){
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM usuarios WHERE id_usu = :ID",array(
            ":ID"=>$id
        ));

        if(count($results)>0){
            $row = $results[0];
            
            $this->setIdUsuario($row['id_usu']);
            $this->setUsuario($row['usuario']);
            $this->setSenha($row['senha']);
            $this->setDtCadastro(new DateTime($row['dt_cadastro']));
        }
    }

    public function __toString()
    {
        return json_encode(array(
            "idUsu"=>$this->getIdUsuario(),
            "usuario"=>$this->getUsuario(),
            "senha"=>$this->getSenha(),
            "dtCadastro"=>$this->getDtCadastro()->format("d/m/Y H:i")
        ));
    }

}

?>