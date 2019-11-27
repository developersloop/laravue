<template>
    <div>
        <div v-if="err" v-bind:class="err == 'true' ? 'alert alert-danger' : 'alert alert-success'" role="alert" id="message">
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
           <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>
                            ID
                               <span @click="teste">
                                    <font-awesome-icon 
                                        :icon="caret" 
                                    />
                               </span>
                        </th>
                        <th>Titulo
                                <font-awesome-icon 
                                  icon="caret-down" />
                        </th>
                        <th>Descrição
                                <font-awesome-icon 
                                  icon="caret-down" />
                        </th>
                        <th>Acao</th>
                    </tr>
                </thead>
                <tbody>
                     <tr class="text-center" v-for="artigos in search" :key="artigos.id">
                          <td>{{artigos.id}}</td>
                          <td>{{artigos.titulo}}</td>
                          <td>{{artigos.descricao}}</td>
                          <td>
                              <button class="btn btn-secondary btn-sm" v-on:click="dispatchEdit(artigos.id)">Editar</button>
                              <button class="btn btn-secondary btn-sm" v-on:click.prevent="Excluir(artigos.id)">Excluir</button>
                              <button class="btn btn-secondary btn-sm" v-on:click="edit(artigos)">Details</button>
                         </td>
                     </tr>
                </tbody>
           </table>
            <Pagination
                    :qtdItems="qtdItems"
                    :numberChoice="numberChoice"
                    @click="pg"/>
</div>

</template>

<script>
import _ from 'lodash';
import axios from 'axios';
import Pagination from '../Pagination/Pagination';
import {getArtigos} from '../../Function/artigos';
import { mapActions, mapMutation,mapGetters } from 'vuex';
const strings  = require('../../Strings');
export default {
    components:{
        Pagination,
    },
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
    },
      data(){
          return{
              trash:'',
              bc:'',
              order:'asc',
              nameColumn:'',
              caret:'caret-down',
              items:[],
              mss:'',
              err:'',
              itensShow:[],
              current_page: 1,
              per_page: '',
              rows:'',
              fields:this.titles,
              obj:{},
              details:false,
              lengthData:'',
              increment:2,
              qtdItems:0,
              decrement:2,
              numberChoice:1
          }
      },


      mounted(){
           this.getMounted();
          this.err = localStorage.getItem('error');
        if(this.err){
           this.mss = localStorage.getItem('mensagem');
                setTimeout(function () {
                $('#message').hide();
                }, 2500);
        }
      },

      methods:{
          ...mapActions('Artigos',['getArtigos']),
          ...mapGetters('Artigos',['data']),
           getMounted(){
                getArtigos(1)
                                .then(data => {
                                        localStorage.setItem('total',data.data.total);
                                        localStorage.setItem('perPage',data.data.perPage)
                                        
                                        this.$set(this.$data,'items',data.data.items)
                                })
                                .catch(err => console.log(err))

                                 this.qtdItems =  Math.round(parseInt(localStorage.getItem('total')) / parseInt(localStorage.getItem('perPage')));
    
                            console.log(this.qtdItems);

           },

           dispatchEdit(id){
               window.location.href = `${this.env}/${id}/edit`
           },

           Excluir(index){
                  let trashObj = this.$store._actions[`${choiceStore}delete`][0](index)
           },

           edit(obj = {}){this.obj = obj;this.details = true;},

        pg(str){

              if(str == 'next'){
                   this.nextPrev(2);
              }
              else if(str == 'previous'){
                   this.previousPrev();
              } 
              else{
                  this.numberChoice = str;
                  this.increment = str + 1;
                  this.decrement = str - 1;
                   getArtigos(str)
                                .then(data => {
                                        this.$set(this.$data,'items',data.data.items)
                                })
                                .catch(err => console.log(err))
              }
        },

        nextPrev(inc){
             this.numberChoice++;
                getArtigos(this.increment++)
                                .then(data => {
                                        this.$set(this.$data,'items',data.data.items)
                                })
                                .catch(err => console.log(err))
        },
        previousPrev(){
                this.numberChoice--;
                let decrement = --this.increment;
                getArtigos(--decrement)
                                .then(data => {
                                        this.$set(this.$data,'items',data.data.items)
                                })
                                .catch(err => console.log(err))
        },

        teste(){
             this.caret === 'caret-down' ? 'caret-up' :  'caret-down';
             console.log(this.caret);
          
        }

      },
      computed:{

          search:function(){
              let busca = this.bc;
              let data = this.items;


                if(busca  === ''){
                    return data;
                }else{

                    return data.filter(item => {
                         if(busca){
                               return item.titulo.toLowerCase().includes(busca.toLowerCase())
                         } else {
                             return false;
                         }
                    })
                }
          }
      },
      watch:{
          increment(val){
               return val;
          }
      }
}
</script>

</style>
