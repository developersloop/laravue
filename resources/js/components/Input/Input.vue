<template>
    <div>
          <input
                 :type="type"
                 class="form-control"
                 :name="name"
                 :placeholder="place"
                 :value="val"
                 @input="$emit('input', {target:$event.target.value,nameInput:name})"
                 />

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

        created(){
             this.$emit('refil','name');
        }
    }
</script>
