		@extends('materialhome')
        @section('content-header')
    <section class="content-header">
      <h1>
        <i class="fa fa-edit"></i> Editar Materiais
        <small>Gerenciamento de materiais</small>
      </h1>
    </section>
@endsection
		@section('conteudo')
		<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-edit"></i> Editar Material
            </div>
            <div class="panel-body">
            <form action="{{ action('MaterialController@update', $material->id) }}" method="POST">
            	 {!! method_field('PUT') !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{is_null(old("nome")) ? $material->nome : old("nome") }}" />
                </div>
                <div class="form-group">
                    <label>Quantidade</label>
                    <input type="text" class="form-control" name="quantidade" value="{{is_null(old("quantidade")) ? $material->quantidade : old("quantidade") }}"/>
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" name="marca" 
                    value="{{is_null(old("marca")) ? $material->marca : old("marca") }}"/>
                </div>
                <div class="form-group">
                    <label>Estado Atual</label>
                    
                    <select class="form-control" name="estado_id">
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}">
                                {{ $estado->estado_atual }}
                            </option>
                        @endforeach
                    </select>

                 </div>
             
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus-circle fa-lg"></i> Salvar
                </button>
                <a class="btn btn-default pull-right" href="{{ action('MaterialController@index') }}">
                    <i class="fas fa-reply"></i> Voltar para a lista
                </a>
            </form>
        </div>
    </div>
	@stop