<template>
    <div class="container">
     <div class="row justify-content-center">
        <div v-bind:class="defineTamanho">
            <slot></slot>
        </div>
     </div>
    </div>
</template>

<script>
export default {
    props:['tamanho'],
    data(){
        return{

        }
    },

    computed:{
        defineTamanho(){
            //  this.tamanho = parseInt(this.tamanho);
             if(this.tamanho >=12){
                 return "col-md-12";
             }
             if(this.tamanho <= 2){
                 return "col-md-2 col-md-offset-5";
             }
             if(this.tamanho %2 == 0){
                 return `col-md-${parseInt(this.tamanho)} col-md-offset-${(12-parseInt(this.tamanho))/2}`;
             }
             else {
                 return `col-md-${parseInt(this.tamanho) + 1} col-md-offset-${(12-(parseInt(this.tamanho)))/2}`;
             }
             return "col-md-2 col-md-offset-5";
        }
    }
}
</script>
