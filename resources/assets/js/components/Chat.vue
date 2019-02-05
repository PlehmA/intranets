<template>

 <div>
         <Sidepanel :contacts="contacts" @selected="startConversationWith" :user="user" :notreaded="notreaded"/>
         <Content :contact="selectedContact" @new="saveNewMessage" :user="user" :mensajes="mensajes"/>
</div>

</template>

<script>

import Sidepanel from './Sidepanel';
import Content from './Content';

     export default{
         props: {
             user: {
                 type: Object,
                 required: true,
             }, 
             mensajes:{
                type: Array,
                required: true,
            },
            contactos: {
                type: Array
            }
         },
        data(){
            return {
                selectedContact: null,
                messages: [],
                contacts: [],
                notreaded: []
            };
        },
        mounted(){
             setInterval(() => { 
                 axios.get('/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });
                 }, 2000);
             setInterval(() => { 
                axios.get('/api/notificaciones')
                .then((response) => {
                    this.notreaded = response.data;
                });
                 }, 2000);
                 
            
             axios.get('/api/convers')
                .then((response) => {
                    this.ultmensaje = response.data;
                });
            
        },
        methods: {
            startConversationWith(contact){
                axios.get(`/conversation/${contact.id_user}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })
            },
            saveNewMessage(text){
                this.messages.push(text)
            },
            hanleIncoming(message){
                if(this.selectedContact && message.from == this.selectedContact.id_user){
                    this.saveNewMessage(message);
                }
            }
        },
        components: {Sidepanel, Content}
    }
</script>
