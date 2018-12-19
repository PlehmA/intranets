<template>
    <ul class="messages" v-if="contact" v-chat-scroll>
          <li
          v-for="mensaje in mensajes.key"
          v-bind="mensaje.key"
          :class="`message${mensaje.to == contact.id_user ? ' replies' : ' sent'}`" 
          v-if="mensaje.to == contact.id_user && mensaje.from == user.id || mensaje.from == contact.id_user && mensaje.to == user.id" 
          v-chat-scroll>
          <div class="locoto"></div>
              <p>{{ mensaje[0] }}</p>
        </li>
        </ul>
</template>

<script>

    export default {
        props: {
            contact: {
                type: Object,
            },
            messages: {
                type: Array,
                required: true
            },
            mensajes: {
                type: Array,
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        watch: {
            contact(contact){

            },
            messages(messages){

            }
        }
       
    }
</script>