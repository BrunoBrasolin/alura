$("#botao-placar").click(mostrarPlacar);
$("#botao-synch").click(sincronizarPlacar);

function mostrarPlacar() {
    $(".placar").stop().slideToggle(600);
}

function scrollPLacar() {
    var posicao = $(".placar").offset().top;
    $("html,body").animate({ scrollTop: posicao + "px" }, 1000);
}

function inserirPlacar() {
    var tabela = $(".placar").find("tbody");
    var usuario = $("#usuarios").val();
    var palavras = $("#contador-palavras").text();

    var linha = criarLinha(usuario, palavras);
    linha.find(".botao-remover").click(remover);

    tabela.prepend(linha);

    $(".placar").slideDown(600);
    scrollPLacar();
}

function criarLinha(usuario, palavras) {
    var linha = $("<tr>");
    var colunaUsuario = $("<td>").text(usuario);
    var colunaPalavras = $("<td>").text(palavras);
    var colunaRemover = $("<td>");

    var link = $("<a>").addClass("botao-remover").attr("href", "#");
    var icone = $("<i>").addClass("material-icons").addClass("small").text("delete");

    link.append(icone);
    colunaRemover.append(link);

    linha.append(colunaUsuario);
    linha.append(colunaPalavras);
    linha.append(colunaRemover);

    return linha;
}

function remover() {
    var linha = $(this).parent().parent();
    linha.fadeOut(1000);
    setTimeout(function () {
        linha.remove();
    }, 1111);
}

function sincronizarPlacar() {
    var placar = [];
    var linha = $("tbody>tr");
    linha.each(function () {
        var usuario = $(this).find("td:nth-child(1)").text();
        var palavras = $(this).find("td:nth-child(2)").text();
        var score = {
            usuario: usuario,
            pontos: palavras
        };

        placar.push(score);
    });
    $.ajax({
        type: 'POST',
        url: 'http://localhost:3000/placar',
        data: {
            placar: placar
        },
        beforeSend: function () {
            //
        },
        success: function () {
            $(".tooltip").tooltipster('open').tooltipster("content", "Sincronizado com sucesso!");
        },
        error: function () {
            $(".tooltip").tooltipster('open').tooltipster("content", "Falha ao sincronizar!");
        },
        complete: function () {
            setTimeout(function () {
                $(".tooltip").tooltipster('close');
            }, 1500);
        }
    });
}

function atualizarPlacar() {
    $.ajax({
        type: 'GET',
        url: 'http://localhost:3000/placar',
        success: function (data) {
            $(data).each(function () {
                var linha = criarLinha(this.usuario, this.pontos);
                linha.find(".botao-remover").click(remover);
                $("tbody").append(linha);
            });
        }
    });
}