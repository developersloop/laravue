<template>
    <div>
     <ol class="breadcrumb">
       <li class="breadcrumb-item" v-for="list in lista" :key="list.id">
           <a v-if="list.url"
              v-bind:class="defineClass"
              v-bind:href="list.url">{{ list.titulo }}</a>
              <span v-if="!list.url">{{ list.titulo }}</span>
      </li>
    </ol>
    </div>
</template>

<script>
export default {
    props:['lista'],
    data(){
        return {

        }
    },
    mounted(){
        console.log(this.lista);
    },
    computed:{
         defineClass:function(){
             if(this.url){
                 return "active";
             } else {
                 return "";
             }
         }
    }
}
</script>
