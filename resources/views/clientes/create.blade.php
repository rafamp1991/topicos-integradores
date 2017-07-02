@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="links">
                <form class="" action="/clientes" method="POST">
                    <div class="form-group col-sm-6">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="" placeholder="Nome">
                        {{($errors->has('nome')) ? $errors->first('nome') : ''}}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="cpf">Cpf:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="" placeholder="Cpf">
                        {{($errors->has('cpf')) ? $errors->first('cpf') : ''}}
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" value="" placeholder="Endereço">
                        {{($errors->has('endereco')) ? $errors->first('endereco') : ''}}
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
                        {{($errors->has('email')) ? $errors->first('email') : ''}}
                    </div>

                    <div class="form-group col-sm-12">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">                       
                        <button type="submit" class="btn btn-success" name="name" value="Salvar">Salvar</button>
                        <a class="btn btn-danger" href="/">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
