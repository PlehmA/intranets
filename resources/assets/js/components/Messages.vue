<template>
    			<ul>
                <li class="replies">
        			{{message.content}}
        		</li>
    			</ul>
</template>

<script>
    export default {
       data(){
           return {
               messages: []
           };
       },
         mounted() {
            axios.get('/api/mensaje').then((response) => {
                this.messages = response.data;
                console.log(response.data);
                });
        }
    }
</script>
