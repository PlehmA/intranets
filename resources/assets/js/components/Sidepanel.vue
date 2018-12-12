<template>
	<div id="sidepanel">
        
    		<div id="profile" >
    			<div class="wrap">
    				<img id="profile-img" :src="user.foto" :class="user.estado" alt="" v-on:click="active = !active"/>
    				<p>{{ user.name }}</p>
    				<div id="status-options"
                    v-bind:class="{active: active}"
                    >
    					<ul>
                            
    						<li id="status-online" class="" @click="cambiarEstado('online')"><span class="status-circle"></span> <p>Disponible</p></li>
    						<li id="status-away" class="" @click="cambiarEstado('away')"><span class="status-circle"></span> <p>Ocupado</p></li>
    						<li id="status-busy" class="" @click="cambiarEstado('busy')"><span class="status-circle"></span> <p>En reunión</p></li>
    						<li id="status-offline" class="" @click="cambiarEstado('offline')"><span class="status-circle"></span> <p>Desconectado</p></li>

    					</ul>
    				</div>

    			</div>
    		</div>
    		<div id="search">
    			<input type="text" placeholder="Buscar..." id="buscador"/>
    		</div>
    		<div id="contacts" style="line-height: 0.5rem;">
           
           
                <ul class="nombres" style="text-decoration: none; color: black;" >
                      <li class="contact" v-for="(contact, index) in contacts" :key="contact.id" @click="selectContact(index, contact)" :class="{ 'selected': index == selected }">
                        <div class="wrap">
                          <span :class="`contactstatus ${contact.estado}`"></span>
                          <img :src="contact.foto" :alt="contact.name" />
                          <div class="meta">
                            <p class="name">{{ contact.name }}</p>
                            <span class="badge green right countmsj" v-if="notreaded[contact.id_user]">{{ notreaded[contact.id_user].length }}</span>
                            <p class="preview">
                                <i class="truncate">{{ contact.ult_mensaje }}</i>
                            </p>
                          </div>
                        </div>
                      </li>
          			</ul>
            

    		</div>

    	</div> <!-- End Side Panel -->
   
</template>

<script>
    export default {
      props: {
         contacts: {
             type: Array,
             default: []
         },
         contactos: {
             type: Array
         },
         user: {
             type: Object,
             required: true
         },
         notreaded: {
             type: Object,
             required: true
         }
			},
			data(){
				return {
                    selected: 0,
                    users: [],
                    active: false,
                    contact: '',
                    notify:[]
				};
            },
			methods: {
				selectContact(index, contact) {
					this.selected = index;
                    this.$emit('selected', contact);
                   // console.log(contact.id_user);
                   axios.put('/conversation/'+ contact.id_user)
                   .then(
                       (response) =>
                       {console.log(response.data)}
                       );
                },
                cambiarEstado(state){
                    axios.put('/api/user/'+ this.user.id, {
                        estado: state,
                    }).then((response) => {
                        console.log(response.status);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
        mounted() {
            axios.get('/api/user')
            .then((response) => {
                    this.users = response.data;
                });
            axios.get('/api/notificaciones')
            .then((response) => {
                    this.notify = response.data;
                });
        }
    }

</script>
<style scoped>
i{
    line-height: normal;
}
</style>