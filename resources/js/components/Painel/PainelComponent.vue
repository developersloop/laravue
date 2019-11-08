<template>
    <div>
         <div class="card">
                <div class="card-header" style="display:flex; flex-flow:row wrap; justify-content:space-between">
                    <div>{{ titulo }}</div>
                    <div>
                        <!-- <a class="btn btn-secondary btn-sm" v-bind:href="previous">Voltar</a> -->
                    </div>

                </div>
                    <div class="card-body">
                         <slot></slot>
                    </div>
        </div>
    </div>
</template>

<script>
export default {
   props:{
         titulo:{
           type: String,
           required:true
       },
       previous:{
            type: String,
            required:false
       }
   },
   data(){
       return {
            prev:true
       }
   },
}
</script>
