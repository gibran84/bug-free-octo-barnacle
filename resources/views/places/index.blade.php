@extends ('layouts.master') 

@section('body')

	@include('layouts.flmsg')
	
	<div class="panel panel-default">

		<div class="panel-heading" style="padding: 0; min-height:50px">
		
			<div class="pull-left" style="padding: 14px; font-weight:bold">Lista de Lugares</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					
					@can('create-place')
					
					<li><a href="{{route('places-create')}}">+ Agregar</a></li>
					
					@endcan
					
					<li><a href="{{route('places-create')}}">- Eliminar</a></li>
				</ul>
			</div>

		</div>

		<table class="table">

			<thead>

				<tr>
				
					<th>&nbsp;</th>

					<th>#</th>

					<th>Nombre</th>

					<th>Creado</th>
					
					<th>&nbsp;</th>

				</tr>

			</thead>

			<tbody>

				@foreach ($places as $place)
				
				<tr>
				
					<td>{{ Form::checkbox('place_id', $place->id) }}</td>

					<td>{{ $place->id }}</td>

					<td>{{ $place->name }}</td>

					<td>{{ $place->created_at }}</td>
					
					<td>
					
						<ul class="nav nav-pills">
						
						@can('show-places')
						
						<li role="presentation" class=""><a href="{{route('show-place', ['place' => $place])}}">Ver</a></li>
						
						@endcan
						
						@can('edit-place')
						
						<li role="presentation" class=""><a href="{{route('edit-place', ['place' => $place])}}">Editar</a></li>
						
						@endcan
						
						</ul>
						
					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

	</div>
	
	{{ $places->links() }}

@endsection
