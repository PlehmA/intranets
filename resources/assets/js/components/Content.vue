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
           var mes = ("0" + (fecha.getMonth() + 1)).slice(-2)
           var dias = ("0" + fecha.getDate()).slice(-2);
           var minutos = ("0" + (fecha.getMinutes() + 1)).slice(-2);
           var dia = dias+'/'+mes+'/'+fecha.getFullYear();
           var hora = fecha.getHours()+':'+minutos;
           var diaguion = dias+'-'+mes+'-'+fecha.getFullYear();

           debe.ref('/chats/fecha/'+diaguion)
                .push({
                    from: this.user.id,
                    to: this.contact.id_user,
                    mensaje: messages,
                    leido: false,
                    fecha: dia,
                    hora: hora
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