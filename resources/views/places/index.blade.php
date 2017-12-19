@extends ('layouts.master') 

@section('body')

	<div class="panel panel-default">

		<div class="panel-heading" style="padding: 0; min-height:50px">
		
			<div class="pull-left" style="padding: 14px; font-weight:bold">Lista de Lugares</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{route('places-create')}}">+ Agregar</a></li>
				</ul>
			</div>

		</div>

		<table class="table">

			<thead>

				<tr>

					<th>#</th>

					<th>Nombre</th>

					<th>Creado</th>
					
					<th></th>

				</tr>

			</thead>

			<tbody>

				@foreach ($places as $place)
				
				<tr>

					<td>{{ $place->id }}</td>

					<td>{{ $place->name }}</td>

					<td>{{ $place->created_at }}</td>
					
					<td>
					
						<a href="{{route('show-place', ['place' => $place])}}">Ver</a>
						
						<a href="{{route('edit-group', ['place' => $place])}}">Editar</a>
						
					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

	</div>

@endsection
