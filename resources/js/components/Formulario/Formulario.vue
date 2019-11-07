<template>
     <form v-on:submit.prevent="handleSubmit" v-bind:method="metodo" class="">
          <div class="row">
               <div class="col-md-12 offset-md-4">
                       <input type="hidden" name="_token" value="2azsDfBcKHxLFZ59Ky93gbHhUCgO9snxhDeiIPZT">
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text"
                                class="form-control"
                                id="titulo"
                                name="titulo"
                                ref="titulo"
                                required
                                placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                          <div class="form-group">
                                <label for="Descricao">Descrição</label>
                                <input type="text"
                                    class="form-control"
                                    id="Descricao"
                                    name="descricao"
                                    ref="descricao"
                                    required
                                    placeholder="Enter Description">
                          </div>
                    </div>
                    <div>
                        <input type="hidden" name="acao" ref="acao">
                    </div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
              </div>
          </div>
    </form>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
     props:['token','metodo'],
     data(){
         return {

         }
     },

     methods:{
         ...mapActions('Artigos',['storeArtigos']),
         ...mapGetters('Artigos',['message']),
         handleSubmit(){
             const titulo = this.$refs.titulo.value;
             const descricao  = this.$refs.descricao.value;
             const Acao = this.$refs.acao.value;

             const data = {
                 titulo,
                 descricao,
                 Acao
             }

            // chamando metodo store artigos vuex
             this.storeArtigos(data);

               if(this.message() === false){
                   console.log('adad');
                    localStorage.setItem('store',true);
                    window.location.href  = 'http://localhost:8081/admin/artigos';

                }


         }
     }
}
</script>

<style scopped>

</style>
