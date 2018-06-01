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
	  		 <i class="fas fa-archive"></i> Emprestimo de Materiais
        <small>Gerenciamento dos Materiais</small>
	  	</h1>
<div class="clearfix"><div/>
  </section>
 @endsection
 @section('conteudo')
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		<i class="fa fa-list"></i>
 		 Todos os Emprestimos
 	</div>
 <div class="panel-body no-padding">
 	<div class="table-responsive">
	<table class="table table-bordered">
	 @if($emprestimo->count())
	 	<thead>
	 		<tr>
	 			<th width="1%">Cód</th>
	 			<th width="25%">Material/Professor</th>
	 			<th width="16%">Status do Emprestimo</th>
	 			<th width="13%">Data Emprestimo</th>
	 			<th>Devolução</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		@foreach ($emprestimo as $empre)
                <tr>
                	<td>{{ $empre->id }}</td>
                	<td>
						<p>Material: {{ $empre->nome }}</p>
						<p>Professor: {{ $empre->name }}</p>
                	</td>
                	<td>{{ $empre->status_emprestimo }}</td>
                	<td>{{ date('d/m/Y', strtotime($empre->data_emprestimo))}}</td>
                	<td>{{ date('d/m/Y | H:i:s', strtotime($empre->devolucao))}}</td>
                </tr>
             @endforeach
	 	</tbody>
	 	@else
	 	 <div class="alert alert-warning alert-dismissible">
			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 	<span aria-hidden="true">&times;</span></button>
                     <strong>Opa!</strong> Nenhum Tipo de Material Cadastrado.
	 	 </div>
	 	 @endif
	 	 <tfoot>
	 	 </tfoot>
	 </table>
	</div>
 </div>
</div>
 @endsection