<template>
   <nav aria-label="...">
        <ul class="pagination">
            <li :class="numberChoice > 1 ? 'page-item' :  'page-item disabled'">
                <a class="page-link" href="#" tabindex="-1" @click.prevent="$emit('click','previous')">Previous</a>
            </li>
            <li :class="item == numberChoice ? 'page-item active' : ''" v-for="item in qtdItems" :key="item">
                <a class="page-link" @click.prevent="$emit('click',item)">{{item}}</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" @click.prevent="$emit('click','next')">Next</a>
            </li>
        </ul>
    </nav>

</template>

<style scopped>
    .pagination {
        margin-top: 40px;
    }
</style>

<script>
import { mapActions } from 'vuex';
import {getUsers} from '../../Function/users';

    export default {
       props:{
              numberChoice:{
                //    type:Number,
                   required:true
              },
              qtdItems:{type:Number,required:true}
        },
       data(){
           return {
                
           }
       },
    }
</script>
