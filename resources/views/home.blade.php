@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem Vindo(a) a Agenda </div>

                

                <div class="col-md-12">
                    <div class="col-md-12 mb-3">
                        <h4>Contatos Cadastrados</h4>
                    </div>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Telefone</th>
                          <th scope="col">Detalhes</th>
                        </tr>
                      </thead>
                      <tbody>
                         @forelse($agendas as $key => $value)
                        <tr>
                          <th scope="row">{{ $value->id }}</th>
                          <td>{{ $value->nome }}</td>
                          <td>{{ $value->telefone }}</td>
                          <td>
                           <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#contato{{ $value->id }}"> Vizualizar </button>
                          </td>

                            <!-- Modal -->
                            <div class="modal fade" id="contato{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Contato Detalhes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="col-md-12">
                                      <p>
                                        <strong>NOME:</strong> {{ $value->nome }} <br>
                                        <strong>E-MAIL:</strong> {{ $value->email }} <br>
                                        <strong>TEL:</strong> {{ $value->nome }} <br>
                                        <strong>ENDEREÇO:</strong> {{ $value->nome }},  {{ $value->numero }} - {{ $value->bairro }}  {{ $value->cidade }} /  {{ $value->uf }} <br>
                                        <strong>CEP:</strong> {{ $value->cep }} <br> 
                                      </p>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button> 
                                  </div>
                                </div>
                              </div>
                            </div>

                        </tr> 

                        @empty
                           <tr> <td>Nenhum Cadastro Encontrado</td></tr>
                        @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
