@extends('materialhome')

@section('conteudo')
@if($errors->count())
 <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-plus"></i> Cadastro de Material
        </div>
        <div class="panel-body">
            <form action="{{ action('EstadoMaterialController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Estado Atual</label>
                    <input type="text" placeholder="Bom, Ruim, Manutenção..." class="form-control" name="estado_atual"/>
                </div>
                <button type="submit" style="margin-bottom: 4px;" class="btn btn-block-mobile  btn-success">
                    <i class="fas fa-check-circle"></i> Salvar
                </button>
                <a class="btn btn-block-mobile btn-default pull-right" href="{{ action('MaterialController@index') }}">
                    <i class="fas fa-reply"></i> Voltar para a lista
                </a>
            </form>
        </div>
    </div>
@stop