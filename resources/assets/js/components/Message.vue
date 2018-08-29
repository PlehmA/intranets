<template>
   
                <li :class="className"><p><slot></slot></p></li>
    		
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