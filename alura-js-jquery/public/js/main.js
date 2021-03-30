var tempoInicial = $("#contador-tempo").text();
var campo = $(".campo-digitacao");

$(function () {
    fraseAleatoria();
    iniciarContador();
    iniciarMarcadores();
    atualizarPlacar();
    $("#botao-reiniciar").click(reiniciarJogo);
    remover();

    $("#usuarios").selectize({
        create: true,
        sortField: 'text'
    });

    $('.tooltip').tooltipster({
        animation: 'fade',
        trigger: 'custom',
        theme: 'tooltipster-punk'
    });
});

function atualizarTempoInicial(tempo) {
    tempoInicial = tempo;
    $("#contador-tempo").text(tempo);
}

function iniciarContador() {
    campo.on("input", function () {
        var conteudo = campo.val();
        var caracteresSemEspaco = conteudo.replace(/\s+/g, '');
        var quantidadeCaracteres = caracteresSemEspaco.length;
        $("#contador-caracteres").text(quantidadeCaracteres);
        var quantidadePalavras = conteudo.split(/\S+/).length - 1;
        $("#contador-palavras").text(quantidadePalavras);
    });
}

function iniciarCronometro() {
    campo.one("focus", cronometro);
}

function cronometro() {
    var contadorTempo = $("#contador-tempo").text();
    var cronometroID = setInterval(
        function () {
            var tempoRestante = contadorTempo--;
            $("#contador-tempo").text(tempoRestante);
            if (tempoRestante < 1) {
                clearInterval(cronometroID);
                finalizarJogo();
            }
        }, 1000);
}

function finalizarJogo() {
    campo.attr("disabled", true);
    campo.addClass("campo-desabilitado");
    inserirPlacar();
}

function reiniciarJogo() {
    campo.removeClass("campo-desabilitado");
    campo.removeClass("digitado-certo");
    campo.removeClass("digitado-errado");
    campo.attr("disabled", false);
    campo.val("");
    $("#contador-tempo").text(tempoInicial);
    $("#contador-caracteres").text("0");
    $("#contador-palavras").text("0");
    iniciarCronometro();
}

function iniciarMarcadores() {
    campo.on("input", function () {
        var frase = $(".frase").text();
        var digitado = campo.val();
        var comparavel = frase.substr(0, digitado.length);
        if (digitado == comparavel) {
            campo.addClass("digitado-certo");
            campo.removeClass("digitado-errado");
        } else {
            campo.addClass("digitado-errado");
            campo.removeClass("digitado-certo");
        }
    });
}