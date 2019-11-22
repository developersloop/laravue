<template>
    <form v-on:submit.prevent="submit" :method="metodo" >
        <slot></slot>
    </form>
</template>

<script>
export default {
    props:{
         metodo:{
              type:String,
              required:true
         },
         func:{
             type:Function,
             required:true
         }
    },
    data(){
        return {

        }
    },

    methods:{
         submit(){
             console.log(this.func());
         }
    }
}
</script>
