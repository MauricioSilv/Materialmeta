@extends('materialhome')
@section('conteudo')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="far fa-clock"></i> Agendamento do Material
		</div>
		<div class="panel-body">
			<form method="POST" action="{{ action('AgendamentoController@agendar') }}">
				{!! csrf_field() !!} 

				 <div class="form-group">
					<label>Professor</label>
				
					
					<input type="text" disabled="disabled" class="form-control" name="professor" value="{{Auth::user()->name}}">
				
				</div>
				<label>Material</label>
				<select class="form-control"  name="material_id" value="material_id">
						@foreach($material as $materiais)
							<option value="{{ $materiais->id }}">{{ $materiais->nome }}</option>
						@endforeach
					</select>
				
				{{-- <div class="form-group">
					<label>Material</label>
					<input type="hidden" name="material_id" value="{{ $material_id }}">
					<input type="text" disabled="disabled" value="{{ $material->nome }}" class="form-control" name="material"/>
				</div> --}}
				<div class="form-group">
					<label>Data</label>
					<input type="date" class="form-control" name="data_agendamento" value="data_agendamento" />
				</div>

				<button class="btn btn-success btn-block-mobile" style="margin-top: 4px;">
					<i class="fas fa-check-circle" ></i> Registrar Agendamento
				</button>

				<a href="/emprestimos"style="margin-top: 4px;" class="btn btn-default btn-block-mobile">
					<i class="fas fa-reply"></i> Voltar para a lista
				</a>
			</form>
		</div>
	</div> 
@endsection