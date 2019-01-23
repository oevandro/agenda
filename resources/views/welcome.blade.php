@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem Vindo(a) a Agenda </div>

                <div class="col-md-12 text-center mb3">
                  <br>
                  <a href="{{ route('home') }}" class="btn btn-primary btn-lg  ">Acessar os Contatos</a>
                  <br>
                  <br>
                </div> 
                
            </div>
        </div>
    </div>
</div>
@endsection
