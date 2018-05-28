@extends('materialhome')
@section('content-header')
	<section class="content-header">
		@if(Session::has('mensagem'))
  	<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	 	{{ Session::get('mensagem') }}
  			 
	</div>
  	 @endif
	  <h1>
	    <i class="fa fa-archive"></i> Condições dos Materiais
	    <small>Gerenciamento de materiais</small>
		<a href="{{ action('EstadoMaterialController@create') }}" class="btn btn-block-mobile pull-right btn-success">
			<i class="fa fa-plus-circle"></i> Criar Novo Estado do Material

		</a>
	  </h1>
	   <div class="clearfix"><div/>
	</section>
@endsection
@section('conteudo')
 <div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-list"></i> Lista de Materiais
	</div>
	<div class="panel-body no-padding">
		<table class="table table-bordered">
		@if(count($estados))
			<thead>
				<tr>
					<th width="1%">Cód</th>
					<th>Estado Atual</th>
					<th width="35%">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($estados as $estado)
					<tr>
						<td>{{ $estado->id }}</td>
						<td>{{ $estado->estado_atual }}</td>
						<td>

							<a href="{{ action('EstadoMaterialController@edit', $estado->id)}}" class="btn btn-default">
								<i class="fa fa-lg fa-edit"></i> Editar
							</a>
				<form action="{{ action('EstadoMaterialController@destroy', $estado->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
              <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
                             </form>
						</td>
					</tr>
				@endforeach
			</tbody>
			 @else
                <div class="alert alert-warning alert-dismissible" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 	<span aria-hidden="true">&times;</span></button>
                     <strong>Opa!</strong> Nenhuma Condição de Material Cadastrado.
                </div>
             @endif
			<tfoot>
				
			</tfoot>
		</table>	
	</div>
</div>
@endsection