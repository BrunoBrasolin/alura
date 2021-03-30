class NegociacaoService {
  constructor() {
    this._http = new HttpService();
  }

  getNegociacoesSemana() {
    return new Promise((resolve, reject) => {
      this._http
        .get("negociacoes/semana")
        .then((negociacoes) =>
          resolve(
            negociacoes.map(
              (object) =>
                new Negociacao(
                  new Date(object.data),
                  object.quantidade,
                  object.valor
                )
            )
          )
        )
        .catch((erro) => {
          console.log(erro);
          reject("Erro ao importar negociações da semana");
        });
    });
  }

  getNegociacoesSemanaAnterior() {
    return new Promise((resolve, reject) => {
      this._http
        .get("negociacoes/anterior")
        .then((negociacoes) =>
          resolve(
            negociacoes.map(
              (object) =>
                new Negociacao(
                  new Date(object.data),
                  object.quantidade,
                  object.valor
                )
            )
          )
        )
        .catch((erro) => {
          console.log(erro);
          reject("Erro ao importar negociações da semana anterior");
        });
    });
  }

  getNegociacoesSemanaRetrasada() {
    return new Promise((resolve, reject) => {
      this._http
        .get("negociacoes/retrasada")
        .then((negociacoes) =>
          resolve(
            negociacoes.map(
              (object) =>
                new Negociacao(
                  new Date(object.data),
                  object.quantidade,
                  object.valor
                )
            )
          )
        )
        .catch((erro) => {
          console.log(erro);
          reject("Erro ao importar negociações da semana retrasada");
        });
    });
  }
}
