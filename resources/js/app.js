/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');


//Components
Vue.component('chat-contacts', require('./components/ChatContacts.vue').default);
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);

const app = new Vue({
    el: '#app',
    name: 'app',
    data: {
        messages: [],
        selectedIds: {
            user_id: null,
            to_user_id: null,
            to_user_name: null
        }
    },

    methods: {
        getMessages(selectedIds) {  

            this.selectedIds.user_id = selectedIds.user_id
            this.selectedIds.to_user_id = selectedIds.to_user_id
            this.selectedIds.to_user_name = selectedIds.to_user_name
            
            axios.post('./getMessages', {
                user_id: selectedIds.user_id,
                to_user_id: selectedIds.to_user_id
            })
            .then(resp => {
                this.messages = resp.data
            })
        },

        addMessage(message) {
            this.messages.push(message)

            axios.post('./sendMessage', {
                to_user_id: this.selectedIds.to_user_id,
                message: message.message
            })
        }

    }
});
