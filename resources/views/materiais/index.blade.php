@extends('materialhome')

@section('content-header')
	<section class="content-header">
	  <h1>
	    <i class="fa fa-archive"></i> Cadastro de Materiais
	    <small>Gerenciamento de materiais</small>
		<a href="{{ action('MaterialController@create') }}" class="btn pull-right btn-success">
			<i class="fa fa-plus-circle"></i> Criar novo Material
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
					<th>Nome</th>
					<th>Quantidade</th>
					<th>Marca</th>
					<th width="30%">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($materiais as $material)
					<tr>
						<td>{{ $material->id }}</td>
						<td>{{ $material->nome }}</td>
						<td>{{ $material->quantidade }}</td>
						<td>{{ $material->marca }}</td>
						<td>
							<a href="#" class="btn btn-success ">
								<i class="fa fa-check-square-o "></i> Emprestar
							</a>

							<a href="#" class="btn btn-default">
								<i class="fa fa-edit"></i> Editar
							</a>

							<a href="#" class="btn btn-danger">
								<i class="fa fa-trash-o"></i> Excluir
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