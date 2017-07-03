<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rota;
use DB;
use PDF;

class RotaController extends Controller
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
     * Display a listing of the vehicles in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $rota = Rota::all();
        return view('rotas.list',['todosrotas' => $rota]);
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
        
        $rota = new Rota;
        $rota->cidade = $request->cidade;
        $rota->endereco_entrega = $request->endereco_entrega;
        $rota->cod_rota = $request->cod_rota;
        $rota->save();

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
        $rota = Rota::find($id);
        if(!$rota){
            abort(404);
        }
        return view('rotas.details')->with('detailpage', $rota);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rota = Rota::find($id);
        if(!$rota){
            abort(404);
        }
        return view('rotas.edit')->with('detailpage', $rota);
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
        
        $rota = new Rota;
        $rota->cidade = $request->cidade;
        $rota->endereco_entrega = $request->endereco_entrega;
        $rota->cod_rota = $request->cod_rota;
        $rota->save();

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
        $rota = Rota::find($id);
        $rota->delete();

        flash('Rota removida com sucesso!')->important()->success();

        return redirect('/');
    }
}
