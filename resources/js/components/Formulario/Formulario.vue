<template>
     <form action="#" method="post" class="">
          <div class="row">
               <div class="col-md-12 offset-md-4" >
                   <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text"
                                class="form-control"
                                id="titulo"
                                aria-describedby="emailHelp"
                                placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                          <div class="form-group">
                                <label for="Descricao">Descrição</label>
                                <input type="text"
                                    class="form-control"
                                    id="Descricao"
                                    placeholder="Enter Description">
                          </div>
                    </div>
                      <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
              </div>
          </div>
    </form>
</template>

<script>
export default {
     data(){
         return {

         }
     }
}
</script>

<style scopped>

</style>
