@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Artigos">
            <List
              v-bind:titulos="['#','titulo','Descrição']"
              v-bind:lista = "{{ $lista }}"
              detalhe="{{ route('artigos.detail') }}" editar="{{ route('artigos.edit',[1]) }}" excluir="{{ env('URI') }}" criar="{{ route('artigos.create') }}"  token={{ csrf_token() }}>
            </List>
    </Painel>
</Grid>
@endsection
