$(function() {
    $("#nis").focusout(function() {
        if ($("#nis").val() != "") {
            $.get(enderecoServidorNis + "?nis=" + $("#nis").val())
            .success(function() {
                console.log("NIS validado");
            })
            .fail(function(resposta) {
                console.log("NIS invalido. Inspecione a resposta no console");
                $(".mensagemErroNis").fadeIn(3000, function(){ 
                    $(".mensagemErroNis").fadeOut();
                });
                console.log(resposta);
            });
        }
    });
});
