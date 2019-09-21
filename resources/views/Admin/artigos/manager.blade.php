@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Artigos">
            <List
              v-bind:titulos="['#','titulo','Descrição']"
              v-bind:items="{{ $artigos }}"
              v-bind:lista = "{{ $lista }}"
              detalhe="detalhe" editar="editar" excluir="{{ env('URI') }}" criar="{{ route('artigos.create') }}"  token={{ csrf_token() }}>
            </List>
    </Painel>
</Grid>
@endsection
