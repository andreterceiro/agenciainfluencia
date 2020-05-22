<?php
function emptyArray(array $array)
{
    foreach ($array as $item) {
        if (! empty($item)) {
            return false;
        }
    }
    return true;
}

function emptyMysqliResult(mysqli_result $mysqliresult)
{
    if ($mysqliresult->num_rows == 0 ) {
        return true;
    }

    return false;
}

function carregarModel($model)
{
    global $diretorioLib;

    require_once $diretorioLib . "/../model/" . $model . "Model.php";
}

function erroStringParaAlert(array $erros)
{
    $erroEncontrado = '';

    foreach ($erros as $erro) {
         if (! is_null($erro)) {
             $erroEncontrado .= $erro . "\\n";
         }
    }

    if (! empty($erroEncontrado)) {
        return mb_substr($erroEncontrado, 0, -2);
    }

    return '';
}
