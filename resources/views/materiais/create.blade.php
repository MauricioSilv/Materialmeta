@extends('materialhome')

@section('conteudo')
@if(count($errors) > 0)
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
            <form action="{{ action('MaterialController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" placeholder="ex: Datashow" class="form-control" name="nome"/>
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" placeholder="ex: sony" class="form-control" name="marca"/>
                </div>
                <div class="form-group">
                    <label>Estado do Material</label>
                    <select class="form-control" name="estado_id">
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}">
                                {{ $estado->estado_atual }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tipo do Material</label>
                    <select class="form-control" name="tipo_id">
                        @foreach($tipo as $tipomaterial)
                            <option value="{{ $tipomaterial->id }}">
                                {{ $tipomaterial->tipo_material }}
                            </option>
                            
                        @endforeach
                    </select>
                </div>
                <button type="submit" style="margin-bottom: 3px;" class="btn btn-block-mobile btn-success">
                    <i class="fa fa-plus-circle fa-lg"></i> Salvar
                </button>
                <a class="btn btn-default btn-block-mobile pull-right" href="{{ action('MaterialController@index') }}">
                    <i class="fas fa-reply"></i> Voltar para a lista
                </a>
            </form>
        </div>
    </div>
@stop