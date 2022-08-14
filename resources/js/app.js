window.Jquery = require('jquery');
import 'jquery-ui/ui/widgets/datepicker.js';


window.Vue = require('vue').default;
require('./bootstrap');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});


