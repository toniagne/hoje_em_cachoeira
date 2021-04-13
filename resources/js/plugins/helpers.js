import $ from 'jquery';

//retorna a url base
export function base() {
    return $('meta[name="base"]').attr('content');
}

//redireciona para uma rota a partir da url base
export function redirect(path) {
    window.location.href = base() + path;
}

//verifica se o a variavel esta definida e contém um valor
export function empty(value) {
    return (value === null || value === '' || value === undefined);
}

//executa uma função dinamicamente pelo nome
export function call(name, context, args) {

    const namespaces = name.split("."), func = namespaces.pop();

    for(let i = 0; i < namespaces.length; i++) {
        context = context[namespaces[i]];
    }

    return context[func].apply(context, Array.prototype.slice.call(arguments, 2));

}

//altera uma variavel GET na url
export function set(param, val, url) {

    //resolve a url base
    url = empty(url) ? window.location.href : url;

    let newAdditionalURL = "";
    let tempArray = url.split("?");
    let baseURL = tempArray[0];
    let additionalURL = tempArray[1];
    let temp = "";

    if (additionalURL) {

        tempArray = additionalURL.split("&");

        for (let i = 0; i < tempArray.length; i++) {
            if (tempArray[i].split('=')[0] != param) {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }

    }

    let rows_txt = temp + "" + param + "=" + val;

    return baseURL + "?" + newAdditionalURL + rows_txt;

}
