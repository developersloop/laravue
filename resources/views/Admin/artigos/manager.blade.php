@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Artigos" previous="{{url()->previous()}}">
            <List
              env="{{ url()->current() }}"
              criar="{{ route('artigos.create') }}"
              token={{ csrf_token() }}
              store="Artigos"
              v-bind:titles="[{key:'id',sortable:true},{key:'titulo',sortable:true},{key:'descricao',sortable:true},{key:'Acao',sortable:false}]">
            </List>
    </Painel>
</Grid>
@endsection
