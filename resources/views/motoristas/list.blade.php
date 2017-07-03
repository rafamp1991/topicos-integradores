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
                    @foreach($todosmotoristas as $motorista)
                        <p>Nome: <a href="/motoristas/{{$motorista->id}}">{{$motorista->nome}}</a></p>
                        <p>Cpf: {{$motorista->cpf}}</p>
                        <p>Endereço: {{$motorista->endereco}}</p>
                        <p>E-mail: {{$motorista->email}}</p>                
                        <p>Categoria: {{$motorista->categoria}}</p>                                    
                        
                        <form action="/motoristas/{{$motorista->id}}" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a class="btn btn-info" href="/motoristas/{{$motorista->id}}/edit">Editar</a>
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
