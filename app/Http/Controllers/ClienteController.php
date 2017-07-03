<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cliente;
use App\Pessoa;
use DB;
use PDF;

class ClienteController extends Controller
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
        $cliente = Cliente::all();
        return view('clientes.list',['todosclientes' => $cliente]);
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
        
        $cliente = new Cliente;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->email = $request->email;
        $cliente->save();

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
        $cliente = Cliente::find($id);
        if(!$cliente){
            abort(404);
        }
        return view('clientes.details')->with('detailpage', $cliente);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        if(!$cliente){
            abort(404);
        }
        return view('clientes.edit')->with('detailpage', $cliente);
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
        
        $cliente = Cliente::with(['pessoa'])->find($id);
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->cpf;
        $cliente->endereco = $request->endereco;
        $cliente->email = $request->email;
        $cliente->save();

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
        $cliente = Cliente::find($id);
        $cliente->delete();

        flash('Cliente removido com sucesso!')->important()->success();

        return redirect('/');
    }
}
