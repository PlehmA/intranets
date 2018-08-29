<template>
	<div id="sidepanel" style="height: 80vh;">
    		<div id="profile" v-for="usr in user" :key="usr.id">
    			<div class="wrap">
    				<img id="profile-img" :src="usr.foto" class="online" alt="" />
    				<p>{{ usr.name }}</p>

    				<div id="status-options">
    					<ul>
    						<li id="status-online" class="active"><span class="status-circle"></span> <p>Disponible</p></li>
    						<li id="status-away" class=""><span class="status-circle"></span> <p>Ocupado</p></li>
    						<li id="status-busy" class=""><span class="status-circle"></span> <p>En reunión</p></li>
    						<li id="status-offline" class=""><span class="status-circle"></span> <p>Desconectado</p></li>
    					</ul>
    				</div>

    			</div>
    		</div>
    		<div id="search">
    			<input type="text" placeholder="Buscar..." id="buscador" v-model="name"/>
    		</div>
    		<div id="contacts" style="line-height: 0.5rem;">
           
           
                <ul class="nombres" style="text-decoration: none; color: black;">
                      <li class="contact" v-for="conversation in searchUser" :key="conversation.id"
                      @click="selectConversation(conversation)">
                        <div class="wrap">
                          <span class="contact-status"></span>
                          <img :src="conversation.foto" alt="" />
                          <div class="meta">
                            <p class="name">{{ conversation.name }}</p>
                            <p class="preview">{{ conversation.ult_mensaje }}</p>
                          </div>
                        </div>
                      </li>
          			</ul>
            

    		</div>

    	</div> <!-- End Side Panel -->
   
</template>

<script>
    export default {
       data(){
           return {
              conversations: [],
              user: [],
              name: ''
           };
       },
        mounted() {
            this.getConversations();
            this.getUser();
           
        },
        methods: {
            getConversations(){
                axios.get('/api/convers')
                .then((response) =>{
                    this.conversations = response.data;
                });
            },
            selectConversation(conversation){
               this.$emit('conversationSelected', conversation);
            },
            getUser(){
                axios.get('/api/user')
                .then((response) =>{
                    this.user = response.data;
                });
            },
            
          
        },
        computed: {
            searchUser(){
                return this.conversations.filter((conversation) => conversation.name.includes(this.name))
            }
        }
    }
</script>
