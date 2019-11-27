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
                        <th>Name
                                <font-awesome-icon 
                                  icon="caret-down" />
                        </th>
                        <th>Email
                                <font-awesome-icon 
                                  icon="caret-down" />
                        </th>
                        <th>Acao</th>
                    </tr>
                </thead>
                <tbody>
                     <tr class="text-center" v-for="users in search" :key="users.id">
                          <td>{{users.id}}</td>
                          <td>{{users.name}}</td>
                          <td>{{users.email}}</td>
                          <td>
                              <button class="btn btn-secondary btn-sm" v-on:click="dispatchEdit(users.id)">Editar</button>
                              <button class="btn btn-secondary btn-sm" v-on:click.prevent="Excluir(users.id)">Excluir</button>
                              <button class="btn btn-secondary btn-sm" v-on:click="edit(users)">Details</button>
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
import {getUsers} from '../../Function/users';
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
          ...mapActions('Users',['getAll']),
          ...mapGetters('Users',['data']),
           getMounted(){
                getUsers(1)
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
               window.location.href = `${this.env}/edit/${id}`
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
                   getUsers(str)
                                .then(data => {
                                        this.$set(this.$data,'items',data.data.items)
                                })
                                .catch(err => console.log(err))
              }
        },

        nextPrev(inc){
             this.numberChoice++;
                getUsers(this.increment++)
                                .then(data => {
                                        this.$set(this.$data,'items',data.data.items)
                                })
                                .catch(err => console.log(err))
        },
        previousPrev(){
                this.numberChoice--;
                let decrement = --this.increment;
                getUsers(--decrement)
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
                               return item.name.toLowerCase().includes(busca.toLowerCase())
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
