<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;
use App\Models\Categoria;
use Carbon\Carbon;

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

        // Passar quantidades de Dados - para criar um DashBoard
        $numMusicas = Musica::all()->count();
        $numCategorias = Categoria::all()->count();
        $lastupMusicas = Musica::latest('id')->first()->updated_at->format('d/m/Y');
        $lastupCategorias = Categoria::latest('id')->first()->updated_at->format('d/m/Y');
        return view('home',array('numMusicas'=>$numMusicas,'numCategorias'=>$numCategorias, 'lastupMusicas'=>$lastupMusicas, 'lastupCategorias'=>$lastupCategorias));
    }
}