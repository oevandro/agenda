@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
         
            <div class="card">

                <div class="card-header">Cadastrar Contato</div>

                   
                <div class="col-md-12 mb3"> 
                  <h2></h2>

                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                <form action="{{ url('agenda/store') }}" method="post">

                        @csrf

                           <div class="input-group  mb-3">
                                <input type="text" name="nome" placeholder="Nome Completo" class="form-control"required  value="{{old('nome')}}">
                           </div>
                           <div class="input-group  mb-3">
                                <input type="email" name="email" placeholder="E-mail" class="form-control" required  value="{{old('email')}}">
                           </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="telefone" placeholder="Telefone com DDD" class="form-control" id="telefone" maxlength="15"required  value="{{old('telefone')}}">
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="cep" placeholder="CEP" id="cep" class="form-control"required  value="{{old('cep')}}">
                            </div>
                           <div class="input-group  mb-3" > 
                              <input type="text" name="rua" placeholder="RUA" id="rua" class="form-control"required  value="{{old('rua')}}">         
                            </div>
                           <div class="input-group  mb-3" > 
                              <input type="text" name="numero" placeholder="NÚMERO" class="form-control"required  value="{{old('numero')}}">          
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="bairro" placeholder="BAIRRO" id="bairro" class="form-control"required  value="{{old('bairro')}}">
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="cidade" placeholder="CIDADE" id="cidade" class="form-control"required  value="{{old('cidade')}}">
                            </div>
                           <div class="input-group  mb-3" >
                                <input type="text" name="uf" placeholder="UF" id="uf" class="form-control"required  value="{{old('uf')}}">
                            </div>
                           <div class="input-group  mb-3">
                            <select name="sexo" id="" class="form-control" required>
                                <option value="">Selecione uma Opção</option>
                                <option value="Homem" {{ (old("sexo") == "Homem" ? "selected":"") }} >Homem</option>
                                <option value="Mulher" {{ (old("sexo") == "Mulher" ? "selected":"") }} >Mulher</option>
                            </select>
                            </div>

                           <div class="input-group  mb-3">
                                <input type="submit"  class="btn btn-primary" value="SALVAR" >
                            </div>

                       </form>
            </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">

              <div class="card-header">Gerenciar Contatos</div>


                <div class="card-body ">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                   
                <div class="col-md-12 text-center  mb-3"> 


                </div>

                <div class="col-md-12"> 
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nome</th> 
                          <th scope="col">Telefone</th> 
                          <th scope="col">Detalhes</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Remover</th>
                        </tr>
                      </thead>
                      <tbody>
                         @forelse($agendas as $key => $value)
                        <tr>
                          <th scope="row">{{ $value->id }}</th>
                          <td>{{ $value->nome }}</td>
                          <td>{{ $value->telefone }}</td>
                          <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#contato{{ $value->id }}"> Vizualizar </button></td>
                          <td> <a href="agenda/{{$value->id }}/editar" class="btn btn-primary btn-sm" > Editar </a></td>
                          <td>  

                           <form method="get" action="{{ url('agenda/'.$value->id.'/delete/') }}"> 
                              <button type="submit" class="btn btn-danger btn-sm"  onclick='return confirm("Tem certeza que gostaria de Excluir: {{ $value->nome }} ");'> Remover </button> 
                            </form>
 
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
            <br>
               <div class="card">

                <div class="card-header">Informações</div>

                <div class="card-body ">
                <div class="col-md-12">
                   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load("current", {packages:["corechart"]});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Genero', 'Qtd'],
                          ['Homens',     {{ $homens }}],
                          ['Mulheres',     {{ $mulheres }}],
                        ]);

                        var options = {
                          title: 'Dados',
                          is3D: true,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                      }
                    </script>

                    <div class="col-md-12 text-center">
                      <p>Total de contatos cadastrados: <strong> {{ $total }}</strong></p>
                    </div>

                  <div id="piechart_3d" style="width: 750px; height: 550px;"></div>
                </div>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
