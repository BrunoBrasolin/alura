class Bind {
  constructor(model, view, ...props) { // A partir do terceiro parâmetro, qualquer parâmetro que estiverr entrará no array do props
    let proxy = ProxyFactory.create(model, props, (model) => view.update(model));
    view.update(model);
    return proxy;
  }
}
