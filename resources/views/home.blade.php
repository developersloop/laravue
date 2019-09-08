@extends('layouts.app')

@section('content')
<Grid tamanho="7">
        <Painel titulo="Dashboard">
                <div class="row">
                     <div class="col-md-4">
                         <Card qtd="80" titulo="Artigos" url="{{ route('artigos.index') }}" cor="orange" icone="ion ion-pie-graph"></Card>
                      </div>
                      <div class="col-md-4">
                         <Card qtd="1500" titulo="Usuários" url="#" cor="blue" icone="ion ion-person-stalker"></Card>
                      </div>
                      <div class="col-md-4">
                          <Card qtd="3" titulo="Autores" url="#" cor="red" icone="ion ion-person"></Card>
                     </div>

                </div>
        </Painel>
</Grid>
@endsection
