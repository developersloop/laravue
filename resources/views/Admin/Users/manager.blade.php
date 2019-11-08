@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Usuários" previous="{{url()->previous()}}">
            <List
              v-bind:lista = "{{ $data }}"
              env="{{ url()->current() }}"
              criar="{{ route('artigos.create') }}"
              token={{ csrf_token() }}
              store="Artigos">
            </List>
    </Painel>
</Grid>
@endsection
