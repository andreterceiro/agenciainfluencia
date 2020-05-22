<?php
session_start();

global $baseView;
global $registry;

$registry->set('view/erro500', 'erro/500.phtml');
$registry->set('apiKeyNis', '9d99f2b191c619bdabef5c054c996843');

if (! extension_loaded('mbstring')) {
    $registry->set('erro', 'É necessário carregar a extensão mbstring');
    $baseView->render("/erro/500");    
}

if (! extension_loaded('curl')) {
    $registry->set('erro', 'É necessário carregar a extensão curl');
    $baseView->render("/erro/500");    
}

$baseView->set(
    "layout",
     array(
        "cabecalho" => "/layout/cabecalho",
        "rodape" => "/layout/rodape"
    )
);
