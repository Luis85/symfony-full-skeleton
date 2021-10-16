import './styles/globals.scss';
import './styles/app.scss';

import 'bootstrap';
import Vue from 'vue';
import App from './vue/App';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios)

new Vue({
    el: '#app',
    render: h => h(App)
});
