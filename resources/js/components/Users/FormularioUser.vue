<template>
     <Formulario metodo="POST" :func="handleSubmit">
            <div class="row">
               <div class="col-md-12 offset-md-4">
                   <div class="col-md-4">
                        <Label descLabel = "Nome"/>
                        <Input
                                type = "text"
                                name = "name"
                                place = "Enter Nome"
                                @refil="handleEmit"/>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <Label descLabel = "Email"/>
                        <Input
                              type = "text"
                              name="email"
                              place = "Enter Email"/>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <Label descLabel = "Senha"/>
                        <Input
                              type = "password"
                              name="password"
                              place="Enter Password"/>
                    </div>
                    <br>
                    <div class="col-md-4">
                         <Button
                             type="submit"
                             classe="btn btn-primary"
                             descBtn = "Criar"/>
                    </div>
              </div>
          </div>
     </Formulario>
</template>

<script>
import Input from '../Input/Input';
import Label from '../Label/Label';
import Button from '../Button/Button';
import Formulario from '../Formulario/Formulario';
import { mapActions , mapGetters } from 'vuex'
export default {
    components:{
        Input,
        Label,
        Button,
        Formulario
    },
     props:{
         labels:{
             type:Array,
         },
         action:{
              type:String,
              required:true
         },
         metodo:{
              type:String,
              required:true
         }
     },
     data(){
         return{
             data:{}
         }
     },

     methods:{
         ...mapActions('Users',['postUsers']),
         ...mapGetters('Users',['message']),
         handleSubmit(){

            //  const name = this.name;
            //  const email  = this.email;
            //  const password = this.password;

            //  const data = {
            //      name,
            //      email,
            //      password,
            //      Acao
            //  }

            //  console.log(data);



            // chamando metodo store artigos vuex
            //  this.storeArtigos(data);

            //    if(this.message() === false){
            //        console.log('adad');
            //         localStorage.setItem('store',true);
            //         window.location.href  = 'http://localhost:8081/admin/user';

            //     }

            return 'adad';

         },



         handleEmit(name){
             console.log(name);
         }
     }
}
</script>

<style scoped>
</style>
