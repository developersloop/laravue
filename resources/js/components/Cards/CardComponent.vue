<template>
       <div v-bind:class="`card border-${defineColor}`" style="max-width: 22rem;">
                <div class="card-header">Header</div>
                <div v-bind:class="`card-body text-${defineColor}`">
                    <h5 class="card-title">{{ titulo }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
       </div>
</template>

<script>
export default {
    props:['titulo','cor','textoColor'],
    data(){
        return {

        }
    },
     computed:{
       defineColor(){
            return `${this.cor}`
       }

   }
}
</script>
