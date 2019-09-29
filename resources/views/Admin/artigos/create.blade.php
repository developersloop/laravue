@extends('layouts.app')

@section('content')
 <Formulario action="{{ route('artigos.store') }}"  metodo="POST"/>
@endsection
