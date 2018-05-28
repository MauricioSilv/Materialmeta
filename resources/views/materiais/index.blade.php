@extends('materialhome')

@section('content-header')

 
	<section class="content-header">
		@if(Session::has('mensagem'))
  	<div class="alert alert-success alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	 	{{ Session::get('mensagem') }}
  			 
	</div>
  	 @endif
  	 <!--fim do if alerts-->
	   <h1>
	    <i class="fa fa-archive"></i> Cadastro de Materiais
	    <small>Gerenciamento de materiais</small>
			<a href="{{ action('MaterialController@create') }}"    class="btn btn-block-mobile pull-right btn-success">
				<i class="fa fa-plus-circle"></i> Criar novo Material
			</a>
		 <div class="clearfix"><div/>
	  </h1>
	</section>

@endsection

@section('conteudo')

 {{-- <form class="sidebar-form">
        <div class="input-group">
          <input type="text" value="{{ $pesquisa }}" name="pesquisa" class="form-control" placeholder="Search...">
          <span class="input-group-btn" >
                <button type="submit" class="btn btn-flat">
                  <i class="fas fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
<div class="panel panel-primary">

	<div class="panel-heading">
		<i class="fa fa-list"></i> Lista de Materiais
	</div>
	
	<div class="panel-body no-padding">
		<div class="table-responsive">
			<table class="table table-bordered ">

		@if($materiais->count())
				<thead>
					<tr>
						<th width="1%">Cód.</th>
						<th width="15%">Nome/Estado/Tipo</th>
						<th width="10%">Marca</th>
						<th width="5%">Status</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($materiais as $material)
					 
						<tr>
							<td>{{ $material->id }}</td>
							<td>
								<p>Nome: {{ $material->nome }}</p>
								<p>Estado:  {{ $material->estado_atual }}</p>
								<p>Tipo: {{  $material->tipo }}</p>
							</td>
							<td>{{ $material->marca }}</td>
						@if($material->status_material == 1)	
							<td><i class="fas fa-circle" style="color: rgb(0,230,0);"></i> Disponível</td>
							@elseif($material->status_material == 2)
							<td><i class="fas fa-circle" style="color: rgb(255, 153, 0);"></i> Agendado</td>
							@elseif($material->status_material == 3)
							<td><i class="fas fa-circle" style="color: rgb(230, 57, 0);"></i> Emprestado</td>
							@endif	
							<td>
				
						 	@switch($material->status_material)
						 	 @case($material->status_material == 1)
								<a href="{{ action('AgendamentoController@listar', $material->id) }}" class="btn btn-warning">
									 <i class="far fa-clock"></i> Agendar
								</a>
							@if(Auth::user()->perfil !== 'professor')
								<a href="{{action('EmprestimoController@show', $material->id)}}" class="btn btm-sm btn-success" >
									<i class="far fa-thumbs-up"></i> Emprestar
								</a>
								
								<a href="{{action('MaterialController@edit' ,$material->id)}}" class="btn btn-default">
									<i class="fa fa-edit"></i> Editar
								</a>
					    
								 <form action="{{ action('MaterialController@destroy', $material->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Deletar? A confirmação apagará PERMANENTEMENTE!')) { return true } else {return false };">
	                                                    <input type="hidden" name="_method" value="DELETE">
	                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
	                             </form>
	                          @endif
	                             @break
	                           @case($material->status_material == 3)
	                           @if(Auth::user()->perfil !== 'professor')

						   	<a href="{{ action('EmprestimoController@edit', $material->id) }}" class="btn btm-sm btn-danger">
						   		<i class="fas fa-exchange-alt"></i> Devolução
						   	</a>
						  {{--  	<button class="btn btn-primary" disabled="disabled" data-toggle="modal" data-target="#modal-{{ $material->id }}"><i class="fas fa-question"></i> Informações</button> --}}
						   	
						   	@foreach($emprestimo as $empre)
						   	  <div class="modal fade" id="modal-{{ $empre->id }}" tabindex="-1" role="dialog">
	                                            <div class="modal-dialog" role="document">
	                                                <div class="modal-content">
	                                                    <div class="modal-header bg-blue">
	                                                        <h1 id="ModalLabel">{{$material->nome}} | {{$material->marca}}</h1>
	                                                    </div>
	                                                    <div class="modal-body">
	                                                        <div class="col-sm-6">
	                                                            <label>Professor:</label>
	                                                            <p></p>
	                                                            <label>Falta fazer:</label>
	                                                            <p></p>
	                                                            <label>Falta fazer:</label>
	                                                            <p></p>
	                                                        </div>
	                                                        <div class="col-sm-6">
	                                                            <label>Data de Emprestimo:</label>
	                                                            <p></p>
	                                                            <label>Hora do Emprestimo:</label>
	                                                            <p></p>
	                                                        </div>
	                                                    <div class="modal-footer">
	                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-reply"></i>FECHAR</button>
	                                                    </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
							  	
	                          @endforeach
	                          @endif
			   				@break
	                            
	                          @case($material->status_material == 2)
	                          @if(Auth::user()->perfil !== 'professor')
								<a href="{{action('EmprestimoController@confirmar', $material->id)}}" class="btn btm-sm btn-success" >
									<i class="fas fa-check-circle"></i> Confirmar
								</a>
								<a href="{{ action('AgendamentoController@desfazer', $material->id) }}" class="btn btm-sm btn-danger">
									<i class="fas fa-times"></i> Desfazer
								</a>
							  @else
							 {{--  <// dd($material->emprestimos); --}}
								<a href="{{ action('AgendamentoController@desfazer', $material->id) }}" class="btn btm-sm btn-danger">
									<i class="fas fa-times"></i> Desfazer
								</a>
							 @endif
	                            @break
	                            @endswitch
					
							</td>
						</tr>

					@endforeach
				</tbody>
				@else
		   <div class="alert alert-warning alert-dismissible" role="alert">
	         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	         	<span aria-hidden="true">&times;</span></button>
	           <strong>Opa!</strong> Nenhum Material Cadastrado.
	        </div>
	     @endif
				<tfoot>
					
				</tfoot>
			</table>
		</div>
	</div>
	
</div>
@endsection