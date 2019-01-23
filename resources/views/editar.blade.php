@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                <div class="card-header">Editar Contato: <strong>{{ $agenda->nome }}</strong></div>

                   
                <div class="col-md-12 mb3"> 
                  <h2></h2>
                <form action="{{ url('agenda/'.$agenda->id).'/atualizar/' }}" method="post">

                        @csrf

                           <div class="input-group  mb-3">
                                <input type="text" name="nome" value="{{ $agenda->nome }}" placeholder="Nome Completo" class="form-control"required>
                           </div>

                           <div class="input-group  mb-3">
                                <input type="email" name="email" value="{{ $agenda->email }}" placeholder="E-mail Completo" class="form-control"required>
                           </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="telefone" placeholder="Telefone com DDD" class="form-control" id="telefone" maxlength="15"  value="{{ $agenda->telefone }}">
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="cep" placeholder="CEP" id="cep" class="form-control"  value="{{ $agenda->cep }}">
                            </div>
                           <div class="input-group  mb-3" > 
                              <input type="text" name="rua" placeholder="RUA" id="rua" class="form-control"  value="{{ $agenda->rua }}">         
                            </div>
                           <div class="input-group  mb-3" > 
                              <input type="text" name="numero" placeholder="NÚMERO" class="form-control"  value="{{ $agenda->numero }}">          
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="bairro" placeholder="BAIRRO" id="bairro" class="form-control"  value="{{ $agenda->bairro }}">
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="cidade" placeholder="CIDADE" id="cidade" class="form-control"  value="{{ $agenda->cidade }}">
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="uf" placeholder="UF" id="uf" class="form-control"  value="{{ $agenda->uf }}">
                            </div>
                           <div class="input-group  mb-3">
                            <select name="sexo" id="" class="form-control"  > 

                                @if ($agenda->sexo  === "Homem") 
                                <option value="Homem">Homem</option>
                                <option value="Mulher">Mulher</option> 
                                @else
                                 <option value="Mulher">Mulher</option> 
                                 <option value="Homem">Homem</option>
                                @endif

                            </select>
                            </div>

                           <div class="input-group  mb-3">
                                <input type="submit"  class="btn btn-primary" value="ATUALIZAR" >
                            </div>

                       </form>
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection
