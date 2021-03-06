@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="links">
                <form class="" action="/rotas" method="POST">
                    <div class="form-group col-sm-6">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" value="" placeholder="Cidade">
                        {{($errors->has('cidade')) ? $errors->first('cidade') : ''}}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="endereco_entrega">Endereço de entrega:</label>
                        <input type="text" class="form-control" id="endereco_entrega" name="endereco_entrega" value="" placeholder="Endereço de entrega">
                        {{($errors->has('endereco_entrega')) ? $errors->first('endereco_entrega') : ''}}
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="cod_rota">Código da rota:</label>
                        <input type="cod_rota" class="form-control" id="cod_rota" name="cod_rota" value="" placeholder="Código da rota">
                        {{($errors->has('cod_rota')) ? $errors->first('cod_rota') : ''}}
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
