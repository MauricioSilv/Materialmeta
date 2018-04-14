@extends('materialhome')
@section('content-header')
	<section class="content-header">
      <h1>
        <i class="fa fa-edit"></i> Editar Tipo dos Materiais
        <small>Gerenciamento de materiais</small>
      </h1>
    </section>
@endsection
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
 <section class="content">
 	<div class="panel panel-primary">
 		 <div class="panel-heading">
                <i class="fa fa-edit"></i> Editar Material
            </div>
            <div class="panel-body">
 <form action="{{ action('TipoMaterialController@update', $tipos->id) }}" method="POST">
 	 {!! method_field('PUT') !!}
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
                    <label>Tipo do Material Atual</label>
                    <input type="text" class="form-control" name="tipo_material" value="{{ is_null( old('tipo_material')) ? $tipos->tipo_material : old('tipo_material') }}" />
                </div>
             
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-circle fa-lg"></i> Salvar
                </button>
                <a class="btn btn-default pull-right" href="{{ action('TipoMaterialController@index') }}">
                    <i class="fas fa-reply"></i> Voltar para a lista
                </a>
            </form>
        </div>
    </div>
</section>
@stop
 