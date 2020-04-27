require('./bootstrap');

import Vue from 'vue';
import VModal from 'vue-js-modal';
Vue.use(VModal);


Vue.component('notification-success', require('./components/Notifications/Success.vue').default);
Vue.component('notification-warning', require('./components/Notifications/Warning.vue').default);
Vue.component('category-edit', require('./components/Manage/Categories/CategoryEdit.vue').default);
Vue.component('delete-confirmation', require('./components/Modals/DeleteConfirmation.vue').default);
Vue.component('dropdown', require('./components/DropDown.vue').default);
Vue.component('counter', require('./components/CharacterCounter.vue').default);

const app = new Vue({
    el: '#app',
    data() {
        return {
             open: false
        }
    }
});
