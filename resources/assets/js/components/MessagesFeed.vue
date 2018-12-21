<template>
    <ul class="messages" v-if="contact" v-chat-scroll >

<div v-for="i in mensajes.length" :key="i.key">

    <center><p class="diasorder">{{ mensajes[i-1]['.key'] }}</p></center> 

<li
         v-for="mensaje of mensajes[i-1]" 
        :key="mensaje['.key']"
          :class="`message${mensaje.to == contact.id_user ? ' replies' : ' sent'}`" 
          v-if="mensaje.to == contact.id_user && mensaje.from == user.id || mensaje.from == contact.id_user && mensaje.to == user.id" 
          v-chat-scroll>

              <p>{{ mensaje.mensaje}} &nbsp; <small> {{ mensaje.hora }} </small></p>
        </li>

</div>

  
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
        data(){
            return {
                meneaito: []
            };
        },
        watch: {
            contact(contact){

            },
            messages(messages){

            }
        }
       
    }
</script>

<style scoped>
    small{
        font-weight: 700;
    color: grey;
    }
    .diasorder{
        background-color:rgba(225, 245, 254, 0.92);
        display: inline-block;
        padding: 10px 15px;
        border-radius: 20px;
        max-width: 205px;
        line-height: 130%;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        margin-right: 120px;
    }
</style>