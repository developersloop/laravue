@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <Painel titulo="Dashboard">
               <div class="row">
                   <Card titulo="Dashboard" cor="primary" textColor="primary"></Card>&nbsp;&nbsp;&nbsp;&nbsp;
                   <Card titulo="Dashboard" cor="success" textColor="success"></Card>&nbsp;&nbsp;&nbsp;&nbsp;
                   <Card titulo="Dashboard" cor="danger" textColor="danger"></Card>&nbsp;
               </div>
            </Painel>
        </div>
    </div>
</div>
@endsection
