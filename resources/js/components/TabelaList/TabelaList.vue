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
         ></b-table>
            <Details nameModal="modalDetails" titulo="Detalhes" v-bind:show="itensShow"/>
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
    props:['titulos','lista','detalhe','editar','criar','excluir','token','_method'],
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
              rows:''

          }
      },
      mounted(){
          this.getMounted();
        //   console.log(this.getMounted());
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
          ...mapGetters('Artigos',['artigos']),
        //   ...mapGetters('Artigos',['paginacao']),
           getMounted(){
               let data = this.getAll();
               const items = this.items;
               this.items.push(this.artigos());

           },



           dispatchEdit(id){
               window.location.href = `http://localhost:8000/admin/artigos/${id}/edit`;
           },
           Excluir:function(index,event){
               event.preventDefault();

               this.delete(index);

           },

           details(id,event){
              this.itensShow = [];
                event.preventDefault();
                let artigos =  JSON.parse(localStorage.getItem('artigos'));

                 for (let index = 0; index < artigos.length; index++) {
                    //  console.log(artigos[index].id);
                     if(artigos[index].id === id){
                         console.log(artigos[index]);
                         this.itensShow.push(artigos[index]);
                     }
                 }

           },

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

// // ?           ORDENACAO

//               if(this.order === 'asc' || this.order === 'desc'){
//                      return _.orderBy(data,this.nameColumn, this.order)
//               }

              if(busca === ''){
                      this.rows = data.length;
                    //   console.log(this.items[0].length)
                      return data;

              }
              else {
                    return data[0].filter(res => {
                        if(res.titulo === busca || res.descricao === busca){
                            //  this.rows = data[0].length;
                           return data[0];
                       }
                       return false;
                  })
              }

          }
      }
}
</script>
