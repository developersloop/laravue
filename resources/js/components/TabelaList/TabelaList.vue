<template>
    <div>
        <div v-if="err" class="alert alert-success" role="alert" id="message">
           {{ mss }}
        </div>
        <!-- <Migalhas :lista="this.lista"/> -->
        <div class="form-inline" style="
             display:flex;
             flex-flow:row wrap;
             justify-content:space-arround">
            <a v-bind:href="criar">Criar</a>
            <div class="form-group pull-right" style="margin-left:450px;">
                 <input type="search" placeholder="Digite sua busca" class="form-control"
                  name="search"
                  id="search"
                  v-model="bc">
                 </br>
            </div>
        </div>
        <br>
          <b-table
            id="my-table"
            :items="search"
            :per-page="per_page"
            :current-page="current_page"
            :fields="fields"
            class="text-center"
           >

             <template v-slot:cell(Acao)="row">
                  <div>
                        <button class="btn btn-secondary btn-sm" v-on:click="dispatchEdit(row.item.id)">Editar</button>
                        <button class="btn btn-secondary btn-sm" v-on:click.prevent="Excluir(row.item.id)">Excluir</button>
                        <button class="btn btn-secondary btn-sm" v-on:click="edit(row.item)">Details</button>
                        <div v-if="obj" class="container">
                            <b-modal v-model="details" title="Detalhes">
                                 <p>
                                     <b>ID:</b>
                                     {{obj.id}}
                                  </p>
                                 <p>
                                     <b>Título:</b>
                                     {{obj.titulo}}
                                 </p>
                                 <p>
                                     <b>Descrição:</b>
                                     {{obj.descricao}}
                                 </p>
                            </b-modal>
                        </div>
                  </div>
             </template>
         </b-table>
             <div v-if="rows > 1" style="display:flex; flex-flow:row wrap; justify-content:space-around; width:450px;">
                 <div>
                        <input class="form-control  mr-sm-2" type="text" ref="pag" placeholder="Enter page number" v-on:keyup.enter="changeCurrentPage()">
                 </div>
                 <div>
                       <b-pagination
                            v-model="current_page"
                            :total-rows="rows"
                            :per-page="per_page"
                            aria-controls="my-table"
                         ></b-pagination>
                 </div>
             </div>


</div>

</template>

<script>
import _ from 'lodash';
import axios from 'axios';
import { mapActions, mapMutation,mapGetters } from 'vuex';
const strings  = require('../../Strings');
export default {
    props:{

         criar:{
             type:String,
             required:true
         },
         env:{
             type:String,
             required:true
         },
         token:{
             type:String,
             required:true
         },
         store:{
             type:String,
             required:true
         },
         titles:{
               type: Array,
               required:true
         }
    },
      data(){
          return{
              trash:'',
              bc:'',
              order:'asc',
              nameColumn:'',
              items:[],
              mss:'',
              err:'',
              itensShow:[],
              current_page: 1,
              per_page: 2,
              rows:'',
              fields:this.titles,
              obj:{},
              details:false,

          }
      },

      created(){

      },

      mounted(){
           this.getMounted();
          localStorage.setItem('store',this.store);
          localStorage.setItem('env',this.env);
          var id = document.getElementById('message');
          this.err = localStorage.getItem('error');
        if(this.err){
           this.mss = localStorage.getItem('mensagem');
                // esconde message apos 5 segundos
                setTimeout(function () {
                $('#message').hide();
                }, 2500);
        }
        localStorage.removeItem('mensagem')
        localStorage.removeItem('error');
      },

      methods:{
           getMounted(){
               const store = this.$store;
               const choiceStore = `${this.store}/`;
               let getAll = store._actions[`${choiceStore}getAll`][0];
               let getData = store.getters[`${choiceStore}data`];
               let data = getAll();
               const items = this.items;
               this.items.push(getData);

           },

           dispatchEdit(id){
               window.location.href = `${this.env}/${id}/edit`
           },

           Excluir(index){
                  let trashObj = store._actions[`${choiceStore}delete`][0](index)
           },

           edit(obj = {}){this.obj = obj;this.details = true;},

           changeCurrentPage(){

               const count = Math.round(this.rows / this.per_page);
               const val = this.$refs.pag.value;

               this.current_page = val;

           },


      },
      computed:{

          title(){
                this.fields = JSON.parse(localStorage.getItem('titles'));
                return this.fields;
          },
          search:function(){
              let busca = this.bc;
              let data = this.items[0];

                this.rows = data != undefined ? data.length : '';

                if(busca  === ''){
                    return data;
                }else{
                    return data.filter(item => {
                         return item.titulo.toLowerCase().includes(busca.toLowerCase())
                    })
                }
          }
      }
}
</script>
