<template>
    <div>
          <input
                 :type="type"
                 class="form-control"
                 :name="name"
                 :placeholder="place"/>

    </div>
</template>

<script>
    export default {
        props:{
            type:{
                type:String
            },
            name:{
                type:String
            },
            place:{
                type:String
            },
            val:{
                 type:String
            }
        },

        data(){
            return {


            }
        },



        created(){
             this.$emit('refil','name');
        }
    }
</script>
