<?php
//requisição do Conexao.php
require "Conexao.php";
class JogosRepositoryPDO {
    private $conexao;

    public function __construct()
    {
        $this -> conexao = Conexao::criar();
    }

    public function listarTodos():array{
        $jogosLista = array();

        $sql = "SELECT * FROM cartuchos";
        $cartuchos = $this->conexao->query($sql);
        while($jogo = $cartuchos->fetchObject()){
            array_push($jogosLista, $jogo);
        }
        return $jogosLista;
    }
    public function salvar($jogo):bool{
        $sql = "INSERT INTO cartuchos (titulo, capa, lore, nota) 
        VALUES(:titulo, :capa, :lore, :nota)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $jogo->titulo, PDO::PARAM_STR);
        $stmt->bindValue(':capa', $jogo->capa, PDO::PARAM_STR);
        $stmt->bindValue(':lore', $jogo->lore, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $jogo->nota, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function favoritar(int $id){
        $sql = "UPDATE cartuchos SET favorito= NOT favorito WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }      
    }

    public function delete(int $id){
        $sql = "DELETE FROM cartuchos WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }      
    }
}
