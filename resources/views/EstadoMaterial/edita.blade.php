@extends('materialhome')
@section('conteudo')

  <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-plus"></i> Editar Estado do Material
        </div>
        <div class="panel-body">
            <form action="{{ action('EstadoMaterialController@update', $estados->id) }}" method="POST">
            	 {!! method_field('PUT') !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Estado Atual</label>
                    <input type="text" class="form-control" name="estado_atual"/>
                </div>
             
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-circle fa-lg"></i> Salvar
                </button>
                <a class="btn btn-default pull-right" href="{{ action('EstadoMaterialController@index') }}">
                    <i class="fa fa-arrow-left"></i> Voltar para a lista
                </a>
            </form>
        </div>
    </div>
@stop