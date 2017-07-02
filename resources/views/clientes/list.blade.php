@extends('layouts.app')
@section('content')

<div id="btn_pdf">
    <button class="btn btn-primary pull-right"><a class="btn-primary" href="{{route('pdfviewClient',['download'=>'pdf'])}}"><span>Download PDF</span></a></button>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links text-center">
                    @foreach($todosclientes as $cliente)
                        <p>Nome: <a href="/clientes/{{$cliente->id}}">{{$cliente->nome}}</a></p>
                        <p>Cpf: {{$cliente->cpf}}</p>
                        <p>Endereço: {{$cliente->endereco}}</p>
                        <p>E-mail: {{$cliente->email}}</p>                       
               
                        <form action="/clientes/{{$cliente->id}}" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a class="btn btn-info" href="/clientes/{{$cliente->id}}/edit">Editar</a>
                            <input class="btn btn-danger" type="submit" name="name" value="Apagar">
                        </form>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
