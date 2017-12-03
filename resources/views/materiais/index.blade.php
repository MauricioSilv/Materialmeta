@extends('materialhome')
@section('conteudo')
<div class="panel panel-primary">
	<div class="panel-heading">Lista de Materiais</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Quantidade</th>
					<th>Marca</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($materiais as $material)
					<tr>
						<td>{{ $material->nome }}</td>
						<td>{{ $material->quantidade }}</td>
						<td>{{ $material->marca }}</td>
						<td>
							<a href="#" class="btn btn-success">Emprestar</a>
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