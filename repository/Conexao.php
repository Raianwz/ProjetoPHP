<?php

class Conexao{
    public static function criar():PDO{
        return new PDO("sqlite:cartuchos.db");
    }
}