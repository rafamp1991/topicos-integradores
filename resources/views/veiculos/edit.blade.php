@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="links">
                <form class="" action="/veiculos/{{$detailpage->id}}" method="POST">
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
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="btn btn-success" type="submit" name="name" value="Salvar">
                        <a class="btn btn-danger" href="/list">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection