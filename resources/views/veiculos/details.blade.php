@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links text-center">
                    <p>
                        Placa: {{$detailpage->placa}}
                    </p>
                    <p>
                        Marca: {{$detailpage->marca}}
                    </p>

                    <a class="btn btn-info" href="/listVehicle">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
