@extends('materialhome')


@section('conteudo')
<div class="panel panel-primary">
	<div class="panel-heading">Lista de Materiais</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
				</tr>
			</thead>
			<tbody>
				@foreach($materiais as $material)
					<tr>
						<td>{{ $material->nome }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection