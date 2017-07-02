<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rotas;
use DB;
use PDF;

class RotasController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rotas.create');
    }

    /**
     * Display a listing of the clients in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $rotas = Rotas::all();
        return view('rotas.list',['todosrotas' => $rotas]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $rotas = DB::table("rotas")->get();
        view()->share('rotas',$rotas);

        if($request->has('download')){

            $pdf = PDF::loadView('pdf/pdfviewRoute');
            return $pdf->download('relatorio_rotas.pdf');
        }

        return view('pdf/pdfview');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cidade' => 'required|string|max:255',
            'endereco_entrega' => 'required|string|max:255',
            'cod_rota' => 'required|string|max:255',
        ]);
        
        $rotas = new Rotas;
        $rotas->cidade = $request->cidade;
        $rotas->endereco_entrega = $request->endereco_entrega;
        $rotas->cod_rota = $request->cod_rota;
        $rotas->save();

        flash('Rota cadastrada com sucesso!')->important()->success();

        return redirect('/'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rotas = Rotas::find($id);
        if(!$rotas){
            abort(404);
        }
        return view('rotas.details')->with('detailpage', $rotas);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rotass = Rotas::find($id);
        if(!$rotas){
            abort(404);
        }
        return view('rotas.edit')->with('detailpage', $rotas);
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
        $this->validate($request, [
            'cidade' => 'required|string|max:255',
            'endereco_entrega' => 'required|string|max:255',
            'cod_rota' => 'required|string|max:255',
        ]);
        
        $rotas = Rotas::find($id);
        $rotas->cidade = $request->cidade;
        $rotas->endereco_entrega = $request->endereco_entrega;
        $rotas->cod_rota = $request->cod_rota;
        $rotas->save();

        flash('Rota atualizada com sucesso!')->important()->success();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rotas = Rotas::find($id);
        $rotas->delete();

        flash('Rota removida com sucesso!')->important()->success();

        return redirect('/');
    }
}
