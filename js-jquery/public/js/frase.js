$("#botao-frase").click(fraseAleatoria);
$("#botao-frase-id").click(buscarFrase);

function fraseAleatoria() {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/frases',
        beforeSend: function () {
            reiniciarJogo();
            $("#loading").css("display", "block");
            $(".erro-server").hide();
            $(".erro-id").hide();
            $("#erro-gif").hide();
            $(".frase").hide();
            $(".informacoes").show();
            $(".campo-digitacao").show();
            $(".campo-digitacao").addClass("campo-desabilitado");
            $(".campo-digitacao").attr("disabled", true);
            $(".pontuacao").show();
        },
        success: function (data) {
            $(".frase").show();
            var numeroAleratorio = Math.floor(Math.random() * data.length);
            $(".frase").text(data[numeroAleratorio].texto);
            atualizarFrase();
            atualizarTempo(data, numeroAleratorio);
            $(".campo-digitacao").removeClass("campo-desabilitado");
            $(".campo-digitacao").attr("disabled", false);
        },
        error: function () {
            $(".erro-server").show();
            $("#erro-gif").css("display", "block");
            $(".informacoes").hide();
            $(".campo-digitacao").hide();
            $(".pontuacao").hide();
        },
        complete: function () {
            $("#loading").hide();
        }
    });
}

function atualizarFrase() {
    var frase = $(".frase").text();
    var tamanhoFrase = frase.split(/\S+/).length - 1;
    $("#tamanho-frase").text(tamanhoFrase);
}

function atualizarTempo(data, fraseId) {
    var tempo = data[fraseId].tempo;
    atualizarTempoInicial(tempo)
}

function buscarFrase() {
    var fraseId = $("#frase-id").val();
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/frases',
        beforeSend: function () {
            reiniciarJogo();
            $(".erro-server").hide();
            $(".erro-id").hide();
            $("#erro-gif").hide();
            $("#loading").css("display", "block");
            $(".frase").hide();
            $(".informacoes").show();
            $(".campo-digitacao").show();
            $(".pontuacao").show();
            $(".campo-digitacao").addClass("campo-desabilitado");
            $(".campo-digitacao").attr("disabled", true);
        },
        success: function (data) {
            if (data[fraseId]) {
                $(".campo-digitacao").removeClass("campo-desabilitado");
                $(".campo-digitacao").attr("disabled", false);
                $(".frase").show();
                var fraseEscolhida = data[fraseId].texto;
                $(".frase").text(fraseEscolhida);

                atualizarFrase();
                atualizarTempo(data, fraseId);
            } else {
                $(".erro-id").show();
                $("#erro-gif").css("display", "block");
                $(".erro-gif").show();
            }
        },
        error: function () {
            $(".erro-server").show();
            $("#erro-gif").css("display", "block");
            $(".informacoes").hide();
            $(".campo-digitacao").hide();
            $(".pontuacao").hide();
        },
        complete: function () {
            $("#loading").hide();
        }
    });
}