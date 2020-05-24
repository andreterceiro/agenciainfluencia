function fazerRequisicaoNIS(numeroNis, callbackSucesso, callbackFail) 
{
    $.get("https://" + enderecoServidorNis + "/?json=1&q=" + numeroNis + "&key=" + chaveNis, callbackSucesso, callbackFail);
}
