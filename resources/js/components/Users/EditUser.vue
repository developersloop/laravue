<template>
     <Formulario metodo="POST" :func="onSubmit">
            <div class="row">
               <div class="col-md-12 offset-md-4">
                   <div class="col-md-4">
                        <Label descLabel = "Nome"/>
                        <Input
                                type = "text"
                                name = "name"
                                place = "Enter Nome"
                                @input="inputHandle"
                                :val="name"
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
                               :val="email"
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
                             descBtn = "Editar"/>
                    </div>
              </div>
          </div>
     </Formulario>
</template>
<script>
import Formulario from '../Formulario/Formulario';

import { mapActions, mapGetters} from 'vuex';
    export default{
        components:{
            Formulario,
        },
        props:['data','metodo','token'],
         data(){
             return {
                  id:'',
                  name:'',
                  email:'',


             }
         },
         mounted(){
              let data = this.data[0];
              this.id = data.id;
              this.name = data.name;
              this.email = data.email;

         },

         methods:{
              ...mapActions('Users',['usersUpdate']),
              ...mapGetters('Users',['error']),
             onSubmit(){
                  let id = this.id;
                  let name = this.name;
                  let email = this.email;
                  let password = this.password;

                  const data  = {
                       id,
                       name,
                       email,
                       password
                 }

                // dispara para vuex update

                this.usersUpdate(data);

             },
               inputHandle(args){
                const { target,nameInput }  = args;

                switch (nameInput) {
                    case 'name':
                          this.name =  target;
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
  .container{
      display: flex;
      flex-flow: column wrap;

  }
</style>
