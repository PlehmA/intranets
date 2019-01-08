<template>
 <div style="height: 80vh;">
        <side-panel 
        @conversationSelected="changeActiveConversation($event)">

        </side-panel>

    <div class="content">
        
        <message 
        v-if="selectedConversation" 
        :contact-id="selectedConversation.id" 
        :contact-name="selectedConversation.name"
        :messages="messages">

        </message>
              
    </div>
</div>
</template>

<script>
    export default {
       data(){
           return {
             selectedConversation: null,
             messages: []
           };
       },
        mounted() {
           Echo.channel('Intranet-development')
            .listen('.MessageSent', (data) => {
                messages.push(data.message);
            });
        },
        methods: {
          changeActiveConversation(conversation){
            
             this.selectedConversation = conversation;
             this.getMessages();
          }
        },
        getMessages(){
                 axios.get(`/api/mensaje?contact_id=${this.selectedConversation.id}`).then((response) => {
                    this.messages = response.data;
                  
                    });
            },
           
          
        }
</script>
