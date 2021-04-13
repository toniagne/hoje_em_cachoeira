'use strict';
Window.JQuery = require('jquery');
Window.$ = require('jquery');
import axios from '../plugins/axios';

$(document).ready(() => {
    $('.job-apply').click((e) => {
        e.preventDefault();
        let route = $(e.currentTarget).attr('href');

        if (route) {
            axios.post(route);
        }
    })
});
