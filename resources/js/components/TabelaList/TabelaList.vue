<template>
    <div>
        <Migalhas :lista="this.lista"/>
        <div class="form-inline" style="
             display:flex;
             flex-flow:row wrap;
             justify-content:space-arround">
            <a href="#">Criar</a>
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
                         <th v-on:click="orderColumn(title,index)" v-for="(title,index) in titulos">{{ title }}</th>
                         <th v-if="detalhe || editar || excluir">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in search" :key="item.id">
                        <td v-for="dt in item" :key= dt.id>{{ dt }}</td>

                        <td v-if="detalhe || editar || excluir">
                             <form v-bind:id ="item.id" v-if="excluir && token" v-bind:action="trash" method="post">
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="_token" v-bind:value="token">

                                 <a v-if="detalhe" v-bind:href="detalhe">Detalhe</a> &nbsp;|
                                 <a v-if="editar"  v-bind:href="editar">Editar</a>&nbsp;|
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
export default {
    props:['titulos','items','lista','detalhe','editar','excluir','token','_method'],
      data(){
          return{
              trash:'',
              bc:'',
              order:'asc',
              nameColumn:'',
          }
      },
      methods:{
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

              let busca = this.bc;
              let data = this.items;
            //   console.log(this.order);

            // ORDENACAO
              if(this.order === 'asc' || this.order === 'desc'){
                     return _.orderBy(data,this.nameColumn, this.order)
              }
              return data.filter(res => {
                   if(res.titulo.toLowerCase().indexOf(busca.toLowerCase()) >= 0){
                       return true;
                   }
                   return false;
              })

              return data;
          }
      }
}
</script>
