<?php
chdir(__DIR__);
$diretorioLib = getcwd();

require_once $diretorioLib . "/Registry.php";
$registry = new Registry;

require_once $diretorioLib . "/Conexao.php";
$conexao = new Conexao;

require_once $diretorioLib . "/error.php";

require_once $diretorioLib . "/../view/BaseView.php";
$baseView = new BaseView;

require_once $diretorioLib . "/setup.php";

require_once $diretorioLib . "/funcoes.php";
