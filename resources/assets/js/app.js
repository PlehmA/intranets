
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('messenger', require('./components/MessengerComponent.vue'));
Vue.component('message', require('./components/Message.vue'));
Vue.component('side-panel', require('./components/Side-panel.vue'));


const frame = new Vue({
    el: '#frame',

    data: {
        formu: null,
        message: '',
        chat:{
            message:[]
        }
    },
    methods: {
        send(){
            if(this.message.length != 0){

                this.chat.message.push(this.message);
                this.message = '';
            }
        }
    }
});