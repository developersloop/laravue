<template>
<div class="modal fade" v-bind:id="nameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="title"><span class="title">{{ titulo }}</span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                </thead>
                <tbody>
                    <tr v-for="dt in show" :key="dt.id">
                        <td>{{ dt.id }}</td>
                        <td>{{ dt.titulo }}</td>
                        <td>{{ dt.descricao }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</template>

<script>
import _ from 'lodash';
import {mapActions,mapGetters} from 'vuex';
     export default {
           props:['id','titulo','nameModal','show'],
           data(){
               return {
                   itens:[]
               }
           },

     }
</script>

<style scopped>
  .title{
      color:red;
      font-weight: none;

  }
</style>
