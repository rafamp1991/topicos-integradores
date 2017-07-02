@extends('layouts.app')
@section('content')

<div id="btn_pdf">
    <button class="btn btn-primary pull-right"><a class="btn-primary" href="{{route('pdfviewVehicle',['download'=>'pdf'])}}"><span>Download PDF</span></a></button>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links text-center">
                    @foreach($todosveiculos as $veiculo)
                        <p>Placa: <a href="/veiculos/{{$veiculo->id}}">{{$veiculo->placa}}</a></p>
                        <p>Marca: {{$veiculo->marca}}</p>

                        <form action="/veiculos/{{$veiculo->id}}" method="POST">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a class="btn btn-info" href="/veiculos/{{$veiculo->id}}/edit">Editar</a>
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
