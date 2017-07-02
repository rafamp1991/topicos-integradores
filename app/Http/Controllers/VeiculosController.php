<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Veiculos;
use DB;
use PDF;

class VeiculosController extends Controller
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
        $veiculos = Veiculos::all();
        return view('veiculos.list',['todosveiculos' => $veiculos]);
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
        
        $veiculos = new Veiculos;
        $veiculos->placa = $request->placa;
        $veiculos->marca = $request->marca;
        $veiculos->save();

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
        $veiculos = Veiculos::find($id);
        if(!$veiculos){
            abort(404);
        }
        return view('veiculos.details')->with('detailpage', $veiculos);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veiculos = Veiculos::find($id);
        if(!$veiculos){
            abort(404);
        }
        return view('veiculos.edit')->with('detailpage', $veiculos);
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
        
        $veiculos = Veiculos::find($id);
        $veiculos->placa = $request->placa;
        $veiculos->marca = $request->marca;
        $veiculos->save();

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
        $veiculos = Veiculos::find($id);
        $veiculos->delete();

        flash('Veiculo removido com sucesso!')->important()->success();

        return redirect('/');
    }
}
