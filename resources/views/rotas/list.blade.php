@extends('layouts.app')
@section('content')

<div id="btn_pdf">
    <button class="btn btn-primary pull-right"><a class="btn-primary" href="{{route('pdfviewRoute',['download'=>'pdf'])}}"><span>Download PDF</span></a></button>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links text-center">
                    @foreach($todosrotas as $rota)
                        <p>Cidade: <a href="/rotas/{{$rota->id}}">{{$rota->cidade}}</a></p>
                        <p>Endereço de entrega: {{$rota->endereco_entrega}}</p>
                        <p>Código da rota: {{$rota->cod_rota}}</p>                                              
                        
                        <form action="/rotas/{{$rota->id}}" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a class="btn btn-info" href="/rotas/{{$rota->id}}/edit">Editar</a>
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
