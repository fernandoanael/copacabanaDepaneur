
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap.js');

window.Vue = require('vue');
import Vue2Filters from 'vue2-filters';

/* Use the Vue1 Filters */
Vue.use(Vue2Filters);

/* SweetAlert */
import VueSweetalert2 from 'vue-sweetalert2';

Vue.use(VueSweetalert2);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('productspreview', require('./components/ProductsPreview.vue'));
Vue.component('sellsreport', require('./components/SellsReport.vue'));
Vue.component('latestsorders', require('./components/LatestsOrders.vue'));
Vue.component('employeespreview', require('./components/EmployeesPreview.vue'));

Vue.component('example', require('./components/Example.vue'));
Vue.component('productsindex',require('./components/ProductsIndex.vue'));
Vue.component('employeesindex', require('./components/EmployeesIndex.vue'));
Vue.component('productsselector', require('./components/ProductsSelector.vue'));
Vue.component('ordernewform', require('./components/OrderNewForm.vue'));

const app = new Vue({
    el: '#app',
    data: function(){
        return {
            hi:'hi'
        }
    }
});
