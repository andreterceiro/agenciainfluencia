<?php
require_once('lib/loader.php');

carregarModel('Cliente');
$cliente = new ClienteModel;

if ((isset($_POST['cmdEnviar'])) && $_POST['cmdEnviar'] == "Enviar") {
    try {
        $erro[] = $cliente->setNome($_POST['nome']);
        $cliente->setNis($_POST['nis']);
        $erro[] = $cliente->setTelefone($_POST['telefone']);
        $erro[] = $cliente->setEmail($_POST['email']);
        $erro[] = $cliente->gravar($_POST);
    	
        if (emptyArray($erro)) {
            $baseView->set(
                "clientes",
   	        $cliente->consultarTodos()
            );
            $baseView->render("/clientes/listagem");
        } else {
            $baseView->set(
                "erro",
   	        $erro
            );
            
            $baseView->set(
                "dadosPostados",
   	        $_POST
            );

            $baseView->render("/clientes/formulario");
        }
    } catch (Exception $e) {
        $baseView->set(
           "dadosPostados",
   	   $_POST
        );
        $baseView->set("erro", array($e->getMessage()));
        $baseView->render("/clientes/formulario");
    }
} elseif ( (isset($_POST['cmdEnviar'])) && ($_POST['cmdEnviar'] == "Cadastrar") )  {
        $baseView->render("/clientes/formulario");
} elseif ( (isset($_GET['id'])) && (! is_null ($_GET['id'])))  {
    $baseView->set(
        "cliente",
	$cliente->consultar((int) $_GET['id'])
    );
    $baseView->render("/clientes/detalhes");
} else {
    $baseView->set(
        "clientes",
	$cliente->consultarTodos()
    );
    $baseView->render("/clientes/listagem");
}
