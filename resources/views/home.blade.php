@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <Painel titulo="Dashboard">
               <div class="row">
                    <div class="col-md-4">
                        <Card qtd="80" titulo="Artigos" url="#" cor="orange" icone="ion ion-pie-graph"></Card>
                     </div>
                     <div class="col-md-4">
                        <Card qtd="1500" titulo="Usuários" url="#" cor="blue" icone="ion ion-person-stalker"></Card>
                     </div>
                     <div class="col-md-4">
                         <Card qtd="3" titulo="Autores" url="#" cor="red" icone="ion ion-person"></Card>
                    </div>

               </div>
            </Painel>
        </div>
    </div>
</div>
@endsection
