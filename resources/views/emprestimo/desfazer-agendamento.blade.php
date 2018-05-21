@extends('materialhome')
@section('conteudo')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="far fa-clock"></i> Desfazer Agendamento do Material
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ action('AgendamentoController@updateDesfazer', $material->id) }}">
				{!! csrf_field() !!} 
				<input type="hidden" name="_method" value="PUT">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">

				 <div class="form-group">
					<label>Professor</label>
				@if(Auth::user()->perfil == 'professor')
					
					<input type="text" name="professor_id" disabled="disabled" value="{{Auth::user()->name}}" class="form-control" /> 
				@else
					<select class="form-control" name="professor_id">
						@foreach($professores as $professor)
							<option value="{{ $professor->id }}">{{ $professor->name}}</option>
						@endforeach
					</select>
				@endif
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
					<i class="fas fa-check-circle"></i> Desfazer
				</button>

				<a href="/materiais" class="btn btn-default">
					<i class="fas fa-reply"></i> Voltar para a lista
				</a>
			</form>
		</div>
	</div> 
@endsection