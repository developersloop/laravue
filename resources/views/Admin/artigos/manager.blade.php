@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Artigos" previous="{{url()->previous()}}">
            <List
              env="{{ url()->current() }}"
              criar="{{ route('artigos.create') }}"
              token={{ csrf_token() }}
              store="Artigos">
            </List>
    </Painel>
</Grid>
@endsection
