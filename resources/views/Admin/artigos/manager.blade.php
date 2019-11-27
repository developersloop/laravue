@extends('layouts.app')

@section('content')
<Grid tamanho="7">
    <Painel titulo="Artigos" previous="{{url()->previous()}}">
            <Lista
              env="{{ url()->current() }}"
              criar="{{ route('artigos.create') }}"
              token={{ csrf_token() }}
              store="Artigos"
              v-bind:titles="{{$getFields}}">
            </Lista>
    </Painel>
</Grid>
@endsection
