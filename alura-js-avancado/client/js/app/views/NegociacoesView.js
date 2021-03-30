class NegociacoesView extends View {
  constructor(elemento) {
    super(elemento);
  }

  template(model) {
    return `
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th onclick="controller.ordena('data')">DATA</th>
            <th onclick="controller.ordena('quantidade')">QUANTIDADE</th>
            <th onclick="controller.ordena('volume')">VALOR</th>
            <th onclick="controller.ordena('valor')">VOLUME</th>
          </tr>
        </thead>

        <tbody>
          ${model.negociacoes
            .map(
              (negociacao) =>
                `
              <tr>
                <td>${DateHelper.dataTexto(negociacao.data)}</td>
                <td>${negociacao.quantidade}</td>
                <td>${negociacao.valor}</td>
                <td>${negociacao.volume}</td>
              </tr>
            `
            )
            .join("")}
        </tbody >

        <tfoot>
          <td colspan="3"></td>
          <td>
            ${model.negociacoes.reduce(
              (total, negociacao) => total + negociacao.volume,
              0.0
            )}
          </td>
        </tfoot>
      </table >
  `;
  }
}
