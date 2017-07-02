@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links text-center">
                    <p>
                        Cidade: {{$detailpage->cidade}}
                    </p>
                    <p>
                        Endereço de Entrega: {{$detailpage->endereco_entrega}}
                    </p>
                    <p>
                        Codigo da Rota: {{$detailpage->cod_rota}}
                    </p>

                    <a class="btn btn-info" href="/listRoute">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
