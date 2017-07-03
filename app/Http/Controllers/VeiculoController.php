<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Veiculo;
use DB;
use PDF;

class VeiculoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculos.create');
    }

    /**
     * Display a listing of the vehicles in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $veiculo = Veiculo::all();
        return view('veiculos.list',['todosveiculos' => $veiculo]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $veiculos = DB::table("veiculos")->get();
        view()->share('veiculos',$veiculos);

        if($request->has('download')){

            $pdf = PDF::loadView('pdf/pdfviewVehicle');
            return $pdf->download('relatorio_veiculos.pdf');
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
            'placa' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);
        
        $veiculo = new Veiculo;
        $veiculo->placa = $request->placa;
        $veiculo->marca = $request->marca;
        $veiculo->save();

        flash('Veiculo cadastrado com sucesso!')->important()->success();

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
        $veiculo = Veiculo::find($id);
        if(!$veiculo){
            abort(404);
        }
        return view('veiculos.details')->with('detailpage', $veiculo);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veiculo = Veiculo::find($id);
        if(!$veiculo){
            abort(404);
        }
        return view('veiculos.edit')->with('detailpage', $veiculo);
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
            'placa' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);
        
        $veiculo = Veiculo::find($id);
        $veiculo->placa = $request->placa;
        $veiculo->marca = $request->marca;
        $veiculo->save();

        flash('Veiculo atualizado com sucesso!')->important()->success();

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
        $veiculo = Veiculo::find($id);
        $veiculo->delete();

        flash('Veiculo removido com sucesso!')->important()->success();

        return redirect('/');
    }
}
