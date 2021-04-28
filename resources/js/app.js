/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Axios } = require('axios');

require('./bootstrap');

window.Vue = require('vue');


//Components
Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    mounted() {
        this.getMessages()

        Echo.private('chat')
        .listen('MessageSent', (e) => {
            this.messages.push({
                message: e.message.message,
                user: e.user
            });
        });
    },

    methods: {
        getMessages() {
            axios.get('./getMessages')
            .then(resp => {
                this.messages = resp.data
            })
        },

        addMessage(message) {
            this.messages.push(message)

            axios.post('./sendMessage', message).then(resp => {
                console.log(resp.data)
            })
        }

    }
});
