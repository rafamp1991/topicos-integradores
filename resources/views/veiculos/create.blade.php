@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="links">
                <form class="" action="/veiculos" method="POST">
                    <div class="form-group col-sm-6">
                        <label for="placa">Placa:</label>
                        <input type="text" class="form-control" id="placa" name="placa" value="" placeholder="Placa">
                        {{($errors->has('placa')) ? $errors->first('placa') : ''}}
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="marca">Marca:</label>
                        <input type="text" class="form-control" id="marca" name="marca" value="" placeholder="Marca">
                        {{($errors->has('marca')) ? $errors->first('marca') : ''}}
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
