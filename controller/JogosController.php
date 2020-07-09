<?php
session_start();
require "./repository/JogosRepositoryPDO.php";
require "./model/Jogo.php";
require "./util/SimpleImage.php";

class JogosController{
    public function index(){
        $jogosRepository =  new JogosRepositoryPDO();
        return $jogosRepository->listarTodos();
    }

    public function save($request){
        $jogosRepository =  new JogosRepositoryPDO();
        $jogo = (object) $request;

        $upload = $this->saveCapa($_FILES);

        if(gettype($upload)=="string"){
            $jogo->capa = $upload;
        }

        if($jogosRepository->salvar($jogo))
        $_SESSION["msg"] = "Jogos cadastrado com Sucesso";

        else
        $_SESSION["msg"] = "Erro ao cadatrar Jogo";
    
        header("Location: /");
    }

    private function saveCapa($file){
        $capaDir = "imagens/capas/";
        $capaPath = $capaDir . basename($file["capa_file"]["name"]);
        $capaTmp = $file["capa_file"]["tmp_name"];
        //metodo de upload sem SimpleImage
        if (move_uploaded_file($capaTmp, $capaPath)){
            return $capaPath;
        }else{
            return false;
        };
        /*  Por algum motivo o Simple Image está dando erro no upload das imagens
            $image = new SimpleImage();
            $image->load($capaTmp);
            $image->resize(200 , 300);
            $image->save($capaPath);
            return $capaPath;
        */
    }
}