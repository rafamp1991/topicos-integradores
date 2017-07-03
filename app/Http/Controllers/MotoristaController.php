<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Motorista;
use App\Funcionario;
use DB;
use PDF;

class MotoristaController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motoristas.create');
    }

    /**
     * Display a listing of the clients in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $motorista = Motorista::all();
        return view('motoristas.list',['todosmotoristas' => $motorista]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $motoristas = DB::table("motoristas")->get();
        view()->share('motoristas',$motoristas);

        if($request->has('download')){

            $pdf = PDF::loadView('pdf/pdfviewDriver');
            return $pdf->download('relatorio_motoristas.pdf');
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
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'categoria' => 'required|string|max:255',
        ]);
        
        $motorista = new Motorista;
        $motorista->nome = $request->nome;
        $motorista->cpf = $request->cpf;
        $motorista->endereco = $request->endereco;
        $motorista->email = $request->email;
        $motorista->categoria = $request->categoria;
        $motorista->save();

        flash('Motorista cadastrado com sucesso!')->important()->success();

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
        $motorista = Motorista::find($id);
        if(!$motorista){
            abort(404);
        }
        return view('motoristas.details')->with('detailpage', $motorista);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motorista = Motorista::find($id);
        if(!$motorista){
            abort(404);
        }
        return view('motoristas.edit')->with('detailpage', $motorista);
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
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'categoria' => 'required|string|max:255',
        ]);
        
        $motorista = new Motorista;
        $motorista->nome = $request->nome;
        $motorista->cpf = $request->cpf;
        $motorista->endereco = $request->endereco;
        $motorista->email = $request->email;
        $motorista->categoria = $request->categoria;
        $motorista->save();

        flash('Motorista atualizado com sucesso!')->important()->success();

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
        $motorista = Motorista::find($id);
        $motorista->delete();

        flash('Motorista removido com sucesso!')->important()->success();

        return redirect('/');
    }
}
