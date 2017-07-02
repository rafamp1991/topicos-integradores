<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clientes;
use DB;
use PDF;

class ClientesController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Display a listing of the clients in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $clientes = Clientes::all();
        return view('clientes.list',['todosclientes' => $clientes]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
    {
        $clientes = DB::table("clientes")->get();
        view()->share('clientes',$clientes);

        if($request->has('download')){

            $pdf = PDF::loadView('pdf/pdfviewClient');
            return $pdf->download('relatorio_clientes.pdf');
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
        ]);
        
        $clientes = new Clientes;
        $clientes->nome = $request->nome;
        $clientes->cpf = $request->cpf;
        $clientes->endereco = $request->endereco;
        $clientes->email = $request->email;
        $clientes->save();

        flash('Cliente cadastrado com sucesso!')->important()->success();

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
        $clientes = Clientes::find($id);
        if(!$clientes){
            abort(404);
        }
        return view('clientes.details')->with('detailpage', $clientes);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Clientes::find($id);
        if(!$clientes){
            abort(404);
        }
        return view('clientes.edit')->with('detailpage', $clientes);
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
        ]);
        
        $clientes = Clientes::find($id);
        $clientes->nome = $request->nome;
        $clientes->cpf = $request->cpf;
        $clientes->endereco = $request->endereco;
        $clientes->email = $request->email;
        $clientes->save();

        flash('Cliente atualizado com sucesso!')->important()->success();

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
        $clientes = Clientes::find($id);
        $clientes->delete();

        flash('Cliente removido com sucesso!')->important()->success();

        return redirect('/');
    }
}
