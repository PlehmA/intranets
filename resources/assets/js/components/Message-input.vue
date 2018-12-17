<template>
  <div class="message-input">
    	<div class="wrap">
            <form @submit.prevent="postMessages">
              <input type="text" placeholder=" Escriba su mensaje..." name="mensaje" value="" id="input-loco" required tabindex="1" autocomplete="off" autofocus/>
            </form>
    	</div>
    </div>
</template>

<script>
    export default {
       data(){
           return {
           
           };
       },
        mounted() {
            
        },
        methods: {
            postMessages(){
                const params={
                    to_id: 2,
                    content: 'dsahldsah'
                };
                 axios.post('/api/mensaje', params)
                 .then((response) => {
                    console.log(response.data);
                    });
            }
        }
    }
</script>
<style scoped>
    .panel{
        margin-bottom: 0;
    }

</style>