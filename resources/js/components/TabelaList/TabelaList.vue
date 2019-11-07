<template>
    <div>
        <div v-if="err" class="alert alert-success" role="alert" id="message">
           {{ mss }}
        </div>
        <Migalhas :lista="this.lista"/>
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
            :fields="fields">
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
             <div v-if="rows > 1">
                 <b-pagination
                    v-model="current_page"
                    :total-rows="rows"
                    :per-page="2"
                    aria-controls="my-table"
                ></b-pagination>
             </div>


</div>

</template>

<script>
import _ from 'lodash';
import $ from 'jquery';
import axios from 'axios';
import Details from '../Details/details';
import { mapActions, mapMutation,mapGetters } from 'vuex';
export default {
    components:{
         'Details':Details
    },
    props:['titulos','lista','editar','criar','env','token','_method'],
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
              fields: ['id', 'titulo', 'descricao','Acao'],
              obj:{},
              details:false


          }
      },
      mounted(){
          this.getMounted();
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
          ...mapActions('Artigos',['getAll']),
          ...mapActions('Artigos',['delete']),
          ...mapGetters('Artigos',['artigos']),
           getMounted(){
               let data = this.getAll();
               const items = this.items;
               this.items.push(this.artigos());

           },

           dispatchEdit(id){
               window.location.href = `${this.env}/${id}/edit`
           },

           Excluir(index){
               this.delete(index);
           },

           edit(obj = {}){this.obj = obj;this.details = true;},



           orderColumn(title,index){
               let prefix = this.order == 'asc' ? 'desc' : (this.order == 'desc' ?  'asc' : 'desc');
               let order = '';
                 switch (title) {
                     case 'titulo':
                          this.order = prefix;
                          this.nameColumn = title;
                     break;

                     case 'Descrição':
                            this.order = prefix;
                            this.nameColumn = 'descricao';
                     break;

                     default:
                         break;
                 }
           },


      },
      computed:{
          search:function(){
              let busca = this.bc;
              let data = this.items[0];

                this.rows = data != undefined ? data.length : '';

              if(busca === ''){
                      return data;

              }
              else {
                    return data.filter(res => {
                        if(res.titulo === busca || res.descricao === busca){
                            //  this.rows = data[0].length;
                           return data;
                       }
                       return false;
                  })
              }

          }
      }
}
</script>
