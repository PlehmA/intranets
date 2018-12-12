<template>
    	<div class="message-input">
    			<div class="wrap">
    
              <input type="text" class="input-loco" placeholder=" Escriba su mensaje..." required tabindex="1" autocomplete="off" autofocus 
              v-model="message" @keydown.enter="send"
              >
          
    			</div>
    		</div>
</template>

<script>
    export default {
        data() {
            return {
                message: ''
            };
        },
        methods: {
            send(e) {
                e.preventDefault();
                if(this.message == '') {
                    return;
                }
                
                this.$emit('send', this.message);
                this.message = '';
            }
        }
    }
</script>