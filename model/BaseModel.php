<?php
class BaseModel
{
    function __construct() 
    {
        $conexao = new Conexao;
        $conexao->selecionarODbEconectar();
    }

}

