@extends('materialhome')
@section('content-header')
  <section class="content-header">
	  	<h1>
	  		 <i class="fa fa-users"></i> Materiais
        <small>Gerenciamento dos Materiais</small>
        <a href="{{ action('TipoMaterialController@create') }}" class="btn pull-right btn-success">
            <i class="fa fa-plus-circle"></i> Criar novo Tipo de Material
        </a>
	  	</h1>
  </section>
 @endsection
 @section('conteudo')
 <div class="panel panel-primary">
 	<div class="panel-heading">
 		<i class="fa fa-list"></i>
 		 Tipos de Materiais
 	</div>
 <div class="panel-body">
	<table class="table table-bordered">
	 @if(count($tipomaterial))
	 	<thead>
	 		<tr>
	 			<th>ID</th>
	 			<th>Tipo Atual</th>
	 			<th>Açoẽs</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		@foreach ($tipomaterial as $tipo) :
                <tr>
                	<td>{{ $tipo->id }}</td>
                	<td>{{ $tipo->tipo_material}}</td>
                	<td>
						<a href="#" class="btn btn-outline-secondary">
							<i class="fa fa-lg fa-edit"></i> Editar
						</a>
						<a href="#" class="btn btn-outline-danger"></a>
						 <i class=""> Excluir</i>
					</td>
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
 @endsection