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
	  		 <i class="far fa-thumbs-up"></i> Emprestimo de Materiais
        <small>Gerenciamento dos Materiais</small>
         <a href="{{ action('AgendamentoController@agendprofessor') }}" class="btn btn-block-mobile pull-right btn-success">
		 	<i class="fa fa-plus-circle"></i> Novo Agendamento
		 </a>
	  	</h1>

<div class="clearfix"><div/>
  </section>
 @endsection
 @section('conteudo')
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		<i class="fa fa-list"></i>
 		Lista de equipamentos
 	</div>
 <div class="panel-body no-padding">
 	<div class="table-responsive">
	<table class="table table-bordered">
	 @if($emprestimo->count())
	 	<thead>
	 		<tr>
	 			<th width="1%">Cód</th>
	 			<th>Nome do material</th>
	 			<th>Status Material</th>
	 			<th>Status do Emprestimo</th>
	 			<th>Ações</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		@foreach ($emprestimo as $empre)
                <tr>
                	<td>{{ $empre->id }}</td>
                	<td>{{ $empre->nome}}</td>
                	<td>{{ $empre->status_material}}</td>
                	<td>{{ $empre->status_emprestimo }}
                  	<td>
						<a href="{{ action('AgendamentoController@desfazer', $empre->material_id) }}" class="btn btn-danger">
							<i class="fas fa-times"></i> Desfazer 
						</a>
					</td>
                </tr>
             @endforeach
	 	</tbody>
	 	@else
	 	 <div class="alert alert-warning alert-dismissible">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 	<span aria-hidden="true">&times;</span></button>
                     <strong>Opa!</strong> você não tem nenhum agendamento ativo.
	 	 </div>
	 	 @endif
	 </table>
	</div>
 </div>
</div>

 @endsection