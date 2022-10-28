<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Musica;
use Session;

class MusicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Musica::paginate(5);
        return view('musica.index',array('musicas' => $musicas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musica.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required',
            'banda' => 'required',
            'album' => 'required',
            'genero' => 'required',
            'ano' => 'required',
        ]);
        $musica = new Musica();
        $musica->nome = $request->input('nome');
        $musica->banda = $request->input('banda');
        $musica->album = $request->input('album');
        $musica->genero = $request->input('genero');
        $musica->ano = $request->input('ano');
        if($musica->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($musica->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\musicas'),$nomearquivo);
            }
            return redirect('musicas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $musica = Musica::find($id);
        return view('musica.show',array('musica' => $musica));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Categoria::All();
        $musica = Musica::find($id);
        return view('musica.edit',array('musica' => $musica, 'categorias' => $categorias));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome' => 'required',
            'banda' => 'required',
            'album' => 'required',
            'genero' => 'required',
            'ano' => 'required',
        ]);
        $musica = Musica::find($id);
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($musica->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\musicas'),$nomearquivo);
        }
        $musica->nome = $request->input('nome');
        $musica->banda = $request->input('banda');
        $musica->album = $request->input('album');
        $musica->genero = $request->input('genero');
        $musica->ano = $request->input('ano');
        if($musica->save()) {
            Session::flash('mensagem','Música alterada com Sucesso!');
            return redirect('musicas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musica = Musica::find($id);
        if (isset($request->foto)) {
        unlink($request->foto);
        }
        $musica->delete();
        Session::flash('mensagem','Música excluída com Sucesso!');
        return redirect(url('musicas/'));
    }
}