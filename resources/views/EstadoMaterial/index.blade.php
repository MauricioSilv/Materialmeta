@extends('materialhome')
@section('content-header')
	<section class="content-header">
	  <h1>
	    <i class="fa fa-archive"></i> Condições dos Materiais
	    <small>Gerenciamento de materiais</small>
		<a href="{{ action('EstadoMaterialController@create') }}" class="btn pull-right btn-success">
			<i class="fa fa-plus-circle"></i> Criar Novo Estado do Material
		</a>
	  </h1>
	</section>
@endsection
@section('conteudo')
 <div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-list"></i> Lista de Materiais
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="1%">Código</th>
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

							<a href="{{ action('EstadoMaterialController@destroy',$estado->id)}}" class="btn btn-danger">
								<i class="fa fa-lg fa-trash"></i> Excluir
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>	
	</div>
</div>
@endsection