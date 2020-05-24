<?php
$cURL = curl_init();
curl_setopt($cURL, CURLOPT_URL, "https://www.nif.pt/?json=1&q=" . $_GET['nis']  . "&key=9d99f2b191c619bdabef5c054c996843");
curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true); 
$resultadoConsulta = json_decode(curl_exec($cURL));
curl_close($cURL);

if ($resultadoConsulta->result == "success") {
   if (isset($resultadoConsulta->records->{$_GET['nis']}) && ((int) $resultadoConsulta->records->{$_GET['nis']}->nif == $_GET['nis'])) {
       echo 1;
   } else { 
       enviarHeaderErro500();
       echo "Um NIS foi encontrado, mas não é igual ao passado.";
   }
} else {
    enviarHeaderErro500();
    echo "Um erro foi retornado: '" . $resultadoConsulta->message . "'" ;
}

if (isset($_GET['debug']) && $_GET['debug'] == 1) {
    echo "<hr />Resultado da consulta: <br />";
    var_dump($resultadoConsulta);
}

function enviarHeaderErro500()
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
}
