import axios from 'axios';
import $ from 'jquery';
import { base } from "./helpers";

//instância um novo cliente axios
const client = axios.create({
    baseURL : base(),
    headers : {
        common : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        'accept': 'application/json',
    },
    progress: event => {
        let completed = Math.round((event.loaded * 100) / event.total);
        console.log("uploading : " + completed + "%");
    }
});

//adiciona o interceptor de requisição
client.interceptors.request.use(config => {

    //notifica o envio
    $.notify({ message : 'Aguarde... Estamos processando os dados.' }, {
        type : 'info'
    });

    return config;

}, error => {
    return Promise.reject(error);
});

//adiciona os interceptors de resposta
client.interceptors.response.use(res => {

    //mensagem
    if(res.data.message)
    {
        $.notify({ message : res.data.message || 'Success! You will be redirected in a few seconds.' }, {
            type : 'success'
        });
    }

    //redirecionamento
    setTimeout(() => {
        if(res.data.redirect) window.location.href = res.data.redirect;
    }, 3000);

    return res;

}, function(error) {

    //códigos de resposta possíveis
    let message = 'An error has occurred, please try again later.';

    switch(error.response.status) {
        case 400: case 403:
            message = error.response.data.message;
        break;
        case 401 :
            message = 'Your session has expired. Please log-in again.';
        break;
        case 500 :
            message = 'An internal error has occurred, please try again later.';
        break;
    }

    //lança a notificação de erro
    $.notify({ message }, {
        type : 'danger'
    });

    return Promise.reject(error);

});

export default client;
