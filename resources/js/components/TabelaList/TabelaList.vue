<template>
    <div>
        <div v-if="message" class="alert alert-success" role="alert" id="message">
            Atualizado com sucesso!
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
        <table class="table table-striped table-hover">
                <thead>
                    <tr>
                         <th v-on:click="orderColumn(title,index)" v-for="(title,index) in titulos" :key="title.id">{{ title }}</th>
                         <th v-if="detalhe || editar || excluir">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in items[0]" :key="item.id">
                        <td>{{ item.id }}</td>
                        <td>{{ item.titulo }}</td>
                        <td>{{ item.descricao }}</td>

                        <td v-if="detalhe || editar || excluir">
                             <form v-bind:id ="item.id" v-if="excluir && token" v-bind:action="trash" method="post">
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="_token" v-bind:value="token">

                                 <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> &nbsp;|
                                 <a href="#" v-on:click="dispatchEdit(item.id)">Editar</a>&nbsp;|
                                 <a href="#" v-on:click="handleSubmit(item.id)">Excluir</a>&nbsp;
                             </form>
                              <span v-if="!token">
                                     <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> &nbsp;|
                                     <a v-if="editar"  v-bind:href="editar">Editar</a>&nbsp;|
                                     <a v-if="excluir" v-bind:href="excluir">Excluir</a>&nbsp;
                              </span>
                        </td>
                    </tr>
                </tbody>
            </table>

    </div>
</template>

<script>
import _ from 'lodash';
import $ from 'jquery';
import { mapActions, mapMutation,mapGetters } from 'vuex';
export default {
    props:['titulos','lista','detalhe','editar','criar','excluir','token','_method'],
      data(){
          return{
              trash:'',
              bc:'',
              order:'asc',
              nameColumn:'',
              items:[],
              message:''
          }
      },
      mounted(){
          this.getMounted();
          this.message = localStorage.getItem('update');
          var id = document.getElementById('message');

          if(this.message != null){
                // esconde message apos 5 segundos
            setTimeout(function () {
            $('#message').hide();
            localStorage.removeItem('update');
            }, 2500);
          }
      },
      methods:{
          ...mapActions('Artigos',['getAll']),
          ...mapGetters('Artigos',['artigos']),
           getMounted(){
               let data = this.getAll();
               const items = this.items;
               console.log(this.artigos());
              this.items.push(this.artigos());


           },

           dispatchEdit(id){
               window.location.href = `http://localhost:8000/admin/artigos/${id}/edit`;
           },
           handleSubmit:function(index){
                this.trash = `${this.excluir}/${index}`;
               localStorage.setItem('a',this.trash)
               document.getElementById(index).submit();
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
           }
      },
      computed:{
          search:function(){
            //  console.log('adad' + this.items);
              let busca = this.bc;
              let data = this.items;

            //    console.log(data)
            // ORDENACAO
              if(this.order === 'asc' || this.order === 'desc'){
                     return _.orderBy(data,this.nameColumn, this.order)
              }
              return data.filter(res => {
                   if(res.titulo.toLowerCase().indexOf(busca.toLowerCase().indexOf()) >= 0){
                       return true;
                   }
                   return false;
              })

              return data;
          }
      }
}
</script>
