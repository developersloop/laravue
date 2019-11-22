<template>
    <div>
        <label>{{descLabel}}</label>
    </div>
</template>
<script>
export default {
    props:{
        descLabel:{
              type:String,
              required:true
        }
    }
}
</script>
