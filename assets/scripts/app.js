import Vue from 'vue'
import App from './App.vue'

import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

Vue.use(Buefy);

var app = new Vue({
    el: '#app',
    data: {
        message: 'Привет, Vue!'
    }
});
