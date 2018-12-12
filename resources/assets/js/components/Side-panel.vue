<template>
	<div id="sidepanel" style="height: 80vh;">
    		<div id="profile" >
    			<div class="wrap">
    				<img id="profile-img"  class="online" alt="" />
    				<p></p>

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
    			<input type="text" placeholder="Buscar..." id="buscador"/>
    		</div>
    		<div id="contacts" style="line-height: 0.5rem;">
           
           
                <ul class="nombres" style="text-decoration: none; color: black;" >
                      <li class="contact" v-for="contact in contacts" :key="contact.id">
                        <div class="wrap">
                          <span class="contact-status"></span>
                          <img :src="contact.foto" :alt="contact.name" />
                          <div class="meta">
                            <p class="name">{{ contact.name }}</p>
                            <p class="preview"></p>
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
         }
      }
    }
</script>
