@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Usuários" previous="{{url()->previous()}}">
            <List
              v-bind:lista = "{{ $data }}"
              env="{{ url()->current() }}"
              criar="{{ route('users.create') }}"
              token={{ csrf_token() }}
              store="Users"
              v-bind:titles="[{key:'id',sortable:true},{key:'name',sortable:true},{key:'email',sortable:true},{key:'Acao',sortable:false}]">
            </List>
    </Painel>
</Grid>
@endsection
