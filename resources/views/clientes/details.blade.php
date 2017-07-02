@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="links text-center">
                    <p>
                        Nome: {{$detailpage->nome}}
                    </p>
                    <p>
                        Cpf: {{$detailpage->cpf}}
                    </p>
                    <p>
                        Endereço: {{$detailpage->endereco}}
                    </p>
                    <p>
                        E-mail: {{$detailpage->email}}
                    </p>

                    <a class="btn btn-info" href="/listClient">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
