<template>
   <div class="content">

          <div class="contact-profile">
            <img :src="contact ? contact.foto : ''" alt="" />
            <p>{{ contact ? contact.name : 'Selecciona una charla' }}</p>
          </div>
        <MessagesFeed :contact="contact" :messages="messages" :mensajes="mensajes" :user="user"/>

    	
    <MessageComposer @send="sendMessage" />
    	
</div>
</template>

<script>
 
import MessagesFeed from './MessagesFeed';
import MessageComposer from './MessageComposer';

    export default {

   props: {
       contact: {
           type: Object,
           default: null
       },
       messages: {
           type: Array,
           default: []
       },
       user: {
           type: Object,
           default: []
       },
       mensajes: {
           type: Array,
           required: true
       }
       
   },
   data() {
       return {
           
       };
   },
   
   methods: {
       sendMessage(messages) {
           if(!this.contact){
               return;
           }
           var fecha = new Date();
           debe.ref('/chats')
                .push({
                    from: this.user.id,
                    to: this.contact.id_user,
                    mensaje: messages,
                    leido: false
                });
            debe.ref('conversation/' + this.user.id + '/' + this.contact.id_user)
                .set({
                    from: this.user.id,
                    to: this.contact.id_user,
                    ultimo_mensaje: messages
                });
           
           axios.post('/conversation/send', {
               contact_id: this.contact.id_user,
               text: messages
           }).then((response) => {
               this.$emit('new', response.data);
           })
       }
   },
   components:{MessagesFeed, MessageComposer}
}
</script>