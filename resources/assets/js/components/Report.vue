<template>
<form action="" method="POST">
    <p>
        <label>
          <input class="with-gap" name="group1" type="radio"  />
          <span>Green</span>
        </label>
      </p>
      <p>
        <label>
          <input class="with-gap" name="group1" type="radio"  />
          <span>Green</span>
        </label>
      </p>
</form>
</template>
<script>

     export default{
        props: {

        },
        data(){
            return {

            };
        },
        mounted() {
            console.log('works fine!')
        }
    }
</script>