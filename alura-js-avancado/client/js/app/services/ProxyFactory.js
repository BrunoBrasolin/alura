class ProxyFactory {
  static _functionCheck(funct) {
    return typeof funct == typeof Function;
  }

  static create(object, props, action) {
    return new Proxy(object, {
      get(target, prop, receiver) {
        if (props.includes(prop) && ProxyFactory._functionCheck(target[prop])) {
          return function () {
            Reflect.apply(target[prop], target, arguments);
            return action(target);
          };
        }
        return Reflect.get(target, prop, receiver);
      },
      set(target, prop, value, receiver) {
        if (props.includes(prop)) {
          target[prop] = value;
          action(target);
        }
        return Reflect.set(target, prop, value, receiver);
      },
    });
  }
}
