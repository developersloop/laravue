<template>
      <button :class="classe">{{descBtn}}</button>
</template>
<script>
export default {
    props:{
        classe:{
             type:String,
             required:true
        },
        descBtn:{
             type:String,
             required:true
        }
    }
}
</script>
