@extends('materialhome')
@section('conteudo')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-refresh"></i> Devolução de Material
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ action('EmprestimoController@update' , $material->id) }}">
				<input type="hidden" name="_method" value="PUT">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label>Professor</label>
					<select class="form-control" name="professor_id">
						@foreach($professores as $professor)
							<option value="{{ $professor->id }}">{{ $professor->nome }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label>Material</label>
					<input type="hidden" name="material_id" value="{{ $material_id }}">
					<input type="text" disabled="disabled" value="{{ $material->nome }}" class="form-control" name="material"/>
				</div>

				<!-- <div class="form-group">
					<label>Data</label>
					<input type="date" class="form-control" name="data"/>
				</div> -->

				<button class="btn btn-success">
					<i class="fas fa-check-circle"></i> Registrar Devolução
				</button>

				<a href="/materiais" class="btn btn-default">
					<i class="fa fa-arrow-left"></i> Voltar para a lista
				</a>
			</form>
		</div>
	</div> 
@endsection