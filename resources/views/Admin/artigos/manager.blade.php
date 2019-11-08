@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Artigos" previous="{{url()->previous()}}">
            <List
              v-bind:lista = "{{ $lista }}"
              env="{{ url()->current() }}"
              criar="{{ route('artigos.create') }}"
              token={{ csrf_token() }}>
            </List>
    </Painel>
</Grid>
@endsection
