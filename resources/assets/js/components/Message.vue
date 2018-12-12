<template>
   
                
    		
</template>

<script>
    export default {
        props:[
            'clase'
        ],
        computed:{
            className(){
                return this.clase;
            }
        },
        mounted() {
           console.log('Component mounted.');
        }
    }
</script>