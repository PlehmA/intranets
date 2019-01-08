require('./bootstrap');


window.Vue = require('vue');
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('chat', require('./components/Chat.vue'));
Vue.component('app-report', require('./components/Report.vue'));

// Initialize Firebase
var VueFire = require('vuefire');
var firebase = require('firebase');
Vue.use(VueFire)

firebase.initializeApp({
    apiKey: "AIzaSyAM-yEyuS_8_pJ4lp1JNq-Umtlqc4V-zoI",
    authDomain: "uitalk-f38cc.firebaseapp.com",
    databaseURL: "https://uitalk-f38cc.firebaseio.com",
    projectId: "uitalk-f38cc",
    storageBucket: "uitalk-f38cc.appspot.com",
    messagingSenderId: "975271494041"
});
const debe = firebase.database();


const frame = new Vue({
    el: '#frame',
    data: {
        formu: null,
        mensajes: [],
        loading: false
    },
    firebase: {
        mensajes: debe.ref('/chats')
    }

});