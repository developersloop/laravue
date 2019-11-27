@extends('layouts.app')

@section('content')
<Editar  
 v-bind:data="{{ $data }}" 
 metodo="PUT" 
 token="{{ csrf_token() }}"/>
@endsection
