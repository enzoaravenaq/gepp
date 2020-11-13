import Vue from 'vue'

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from "./store/index"

const store = new Vuex.Store(
    storeData
)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('order-test-levels-component', require('./components/OrderTestLevelsComponent.vue').default);
Vue.component('level-execution-global-component', require('./components/LevelExecutionGlobalComponent.vue').default);
Vue.component('level-execution-activities-component', require('./components/LevelExecutionActivitiesComponent.vue').default);
Vue.component('activity-result-form-component', require('./components/ActivityResultFormComponent.vue').default);
Vue.component('activity-result-edit-form-component', require('./components/ActivityResultEditFormComponent.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    store
});




