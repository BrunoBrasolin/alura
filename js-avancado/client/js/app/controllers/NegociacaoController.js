class NegociacaoController {
  constructor() {
    let $ = document.querySelector.bind(document);

    this._inputQuantidade = $("#quantidade");
    this._inputData = $("#data");
    this._inputValor = $("#valor");

    this._lista = new Bind(
      new ListaNegociacoes(),
      new NegociacoesView($("#view")),
      "adiciona",
      "esvazia",
      "ordena",
      "reverteOrdem"
    );

    this._ordemAtual = "";

    this._mensagem = new Bind(
      new Mensagem(),
      new MensagemView($("#mensagemView")),
      "texto"
    );
  }

  adiciona(e) {
    e.preventDefault();
    this._lista.adiciona(this._criaNegociacao());
    this._mensagem.texto = "Negociação adicionada com sucesso";
    this._limpaFormulario();
  }

  importa() {
    let service = new NegociacaoService();

    Promise.all([
      service.getNegociacoesSemana(),
      service.getNegociacoesSemanaAnterior(),
      service.getNegociacoesSemanaRetrasada(),
    ])
      .then((negociacoes) => {
        negociacoes
          .reduce((arrayAchatado, array) => arrayAchatado.concat(array), []) // Cria uma arrayAchatado (vazio - []), e o array que esta dentro sera coincatenado com o arrayAchatado, deixando apenas um array - Pega o conteudo do array e para cada item concatena este item no arrayAcahatado
          .forEach((negociacao) => this._lista.adiciona(negociacao));
        this._mensagem.texto = "Negociações adicionadas com sucesso";
        this._inputData.focus();
      })
      .catch((erro) => console.log(erro));

    // Promete que tentara obter estes dados
    // se for cumprida a promessa, então recebo a lista e adiciono cada uma
  }

  deleta() {
    this._lista.esvazia();
    this._mensagem.texto = "Negociações apagadas com sucesso";
  }

  ordena(coluna) {
    if (this._ordemAtual == coluna) this._lista.reverteOrdem();
    else this._lista.ordena((a, b) => a[coluna] - b[coluna]);
    this._ordemAtual = coluna;
  }

  _criaNegociacao() {
    return new Negociacao(
      DateHelper.textoData(this._inputData.value),
      this._inputQuantidade.value,
      this._inputValor.value
    );
  }

  _limpaFormulario() {
    this._inputData.value = "";
    this._inputQuantidade.value = 1;
    this._inputValor.value = 0.0;

    this._inputData.focus();
  }
}
