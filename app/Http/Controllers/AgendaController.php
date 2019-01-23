<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agendas = Agenda::orderBy('created_at', 'desc')->paginate(10);
        $total = Agenda::count();
        $mulheres = Agenda::where('sexo', 'Mulher')->count();
        $homens = Agenda::where('sexo', 'Homem')->count();
        return view('/agenda',['agendas' => $agendas,'mulheres' => $mulheres,'homens' => $homens,'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valida
        $rules = [

        'nome' => 'required|min:3|max:100',
        'email' => 'required|email',
        'telefone' => 'required|min:8|max:15',
        'cep' => 'required',
        'rua' => 'required',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'uf' => 'required',
        'sexo' => 'required'
        ];

        $this->validate($request, $rules);

        //Salva
        $agenda = new Agenda;
        $agenda->nome        = $request->nome;
        $agenda->telefone    = $request->telefone;
        $agenda->email    = $request->email;
        $agenda->cep         = $request->cep;
        $agenda->rua         = $request->rua;
        $agenda->numero      = $request->numero;
        $agenda->bairro      = $request->bairro;
        $agenda->cidade      = $request->cidade;
        $agenda->uf          = $request->uf;
        $agenda->sexo        = $request->sexo;
        $agenda->save();
        return redirect()->route('agenda')->with('message', 'Contato Cadastrado com Sucesso!')->withInput();
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        $agenda = Agenda::find($agenda)->first();

        //dd($agenda);
        return view('/editar', ['agenda' => $agenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
        //Valida
        $rules = [

        'nome' => 'required|min:3|max:100',
        'email' => 'required|email',
        'telefone' => 'required|min:8|max:15',
        'cep' => 'required',
        'rua' => 'required',
        'numero' => 'required',
        'bairro' => 'required',
        'cidade' => 'required',
        'uf' => 'required',
        'sexo' => 'required'
        ];

        $this->validate($request, $rules);

         $agenda = Agenda::findOrFail($agenda)->first();
         $agenda->nome        = $request->nome;
            $agenda->telefone    = $request->telefone;
            $agenda->email    = $request->email;
            $agenda->cep         = $request->cep;
            $agenda->rua         = $request->rua;
            $agenda->numero      = $request->numero;
            $agenda->bairro      = $request->bairro;
            $agenda->cidade      = $request->cidade;
            $agenda->uf          = $request->uf;
            $agenda->sexo        = $request->sexo;
            $agenda->update();
        return redirect()->route('agenda')->with('message', 'Contato Atualizado com Sucesso!')->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
        $agenda = Agenda::findOrFail($agenda)->first();
        $agenda->delete();        
        return redirect()->route('agenda')->with('message', 'Contato removido com sucesso!');
    }
}
