<?php

namespace App\Http\Controllers;

use App\Agenda;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agendas = Agenda::orderBy('created_at', 'desc')->paginate(10);
        return view('/home',['agendas' => $agendas]);
    }
}
