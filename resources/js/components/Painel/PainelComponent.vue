<template>
    <div>
         <div class="card">
                <div class="card-header">{{ titulo }}</div>
                    <div class="card-body">
                         <slot></slot>
                    </div>
        </div>
    </div>
</template>

<script>
export default {
   props:['titulo'],
   data(){
       return {

       }
   }
}
</script>
