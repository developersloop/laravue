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
                                @input="inputHandle"
                                required/>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <Label descLabel = "Email"/>
                        <Input
                              type = "text"
                              name="email"
                              place = "Enter Email"
                               @input="inputHandle"
                               required/>
                    </div>
                    <br>
                    <div class="col-md-4">
                        <Label descLabel = "Senha"/>
                        <Input
                              type = "password"
                              name="password"
                              place="Enter Password"
                              @input="inputHandle"
                              required/>
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
             nome:'',
             email:'',
             password:''
         }
     },




     methods:{
         ...mapActions('Users',['postUsers']),
         ...mapGetters('Users',['message']),
         handleSubmit(){

             const name = this.nome;
             const email  = this.email;
             const password = this.password;

             const data = {
                 name,
                 email,
                 password
             }


            // implementar sistema de chamadas

            //  this.postUsers(data);
            //    if(this.message() === false){
            //        console.log('adad');
            //         localStorage.setItem('store',true);
            //         window.location.href  = 'http://localhost:8081/admin/users';

            //     }

            // return 'adad';

         },



        //  handleEmit(name){
        //      console.log(name);
        //  }

            inputHandle(args){
                const { target,nameInput }  = args;

                switch (nameInput) {
                    case 'name':
                          this.nome =  target;
                    break;

                    case 'email':
                          this.email =  target;
                    break;

                    case 'password':
                          this.password =  target;
                    break;
                }
            }
     }
}
</script>

<style scoped>
</style>
