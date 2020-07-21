<?php
session_start();
require "./repository/JogosRepositoryPDO.php";
require "./model/Jogo.php";
require "./util/SimpleImage.php";

class JogosController
{
    public function index()
    {
        $jogosRepository =  new JogosRepositoryPDO();
        return $jogosRepository->listarTodos();
    }

    public function save($request)
    {
        $jogosRepository =  new JogosRepositoryPDO();
        $jogo = (object) $request;

        $upload = $this->saveCapa($_FILES);

        if (gettype($upload) == "string") {
            $jogo->capa = $upload;
        }

        if ($jogosRepository->salvar($jogo))
            $_SESSION["msg"] = "Jogos cadastrado com Sucesso";

        else
            $_SESSION["msg"] = "Erro ao cadatrar Jogo";

        header("Location: /");
    }

    private function saveCapa($file){
        $capaDir = "imagens/capas/";
        $capaPath = $capaDir . basename($file["capa_file"]["name"]);
        $capaTmp = $file["capa_file"]["tmp_name"];

        $image = new SimpleImage();
        $image->load($capaTmp);
        $image->resize(200, 300);
        $image->save($capaPath);
        return $capaPath;
    }

    public function favorite(int $id){
        $jogosRepository = new JogosRepositoryPDO();
        $result = ['sucess' => $jogosRepository->favoritar($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }
    
    public function delete(int $id){
        $jogosRepository = new JogosRepositoryPDO();
        $result = ['sucess' => $jogosRepository->delete($id)];
        header('Content-type: application/json');
        echo json_decode($result);
    }
}
