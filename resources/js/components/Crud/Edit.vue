<template>
   <form v-on:submit.prevent="onSubmit" method="POST">
       <input name="_method" type="hidden" v-model="metodo">
       <input name="_token" type="hidden" v-model="token">

     <div class="row container offset-md-4">
        <div class="col-md-4">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text"
                   class="form-control"
                   name="titulo"
                   id="titulo"
                   v-model="titulo"
                   placeholder="Enter Title">
        </div>
         </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="descricao">Descricao</label>
                <input type="text"
                       class="form-control"
                       name="descricao"
                       id="descricao"
                       v-model="descricao"
                       placeholder="Enter Descrição">
            </div>
        </div>
         <div class="col-md-4">
             <button type="submit" class="btn btn-primary">Editar</button>
         </div>
     </div>

</form>
</template>


<script>
import { mapActions, mapGetters} from 'vuex';
    export default{
        props:['data','metodo','token'],
         data(){
             return {
                  titulo:'',
                  descricao:'',
                  id:'',
                  url:'',


             }
         },
         mounted(){
             let data = this.data[0];
             let id = data.id;
             let titulo = data.titulo;
             let descricao = data.descricao;
             let url = `http://localhost:8000/admin/artigos/${id}`;

             this.id = id;
             this.titulo = titulo,
             this.descricao = descricao;
         },

         methods:{
              ...mapActions('Artigos',['updateArtigos']),
              ...mapGetters('Artigos',['error']),
             onSubmit(){
                  let id = this.id;
                  let titulo = this.titulo;
                  let descricao = this.descricao;

                  const data  = {
                       id,
                       titulo,
                       descricao,
                 }

                // dispara para vuex update

                this.updateArtigos(data);

             }
         }
    }
</script>

<style scoped>
  .container{
      display: flex;
      flex-flow: column wrap;

  }
</style>
