@extends ('layouts.master') 

@section('body')
	
	@include('layouts.flmsg')
	
	<div class="panel panel-default">

		<div class="panel-heading" style="padding: 0; min-height:50px">
		
			<div class="pull-left" style="padding: 14px; font-weight:bold">Lista de Usuarios</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{route('create-user')}}">+ Agregar</a></li>
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

				@foreach ($users as $user)
				
				<tr>

					<td>{{ $user->id }}</td>

					<td>{{ $user->name }}</td>

					<td>{{ $user->created_at }}</td>
					
					<td>
					
						<a href="{{route('show-user', ['user' => $user])}}">Ver</a>
						
						<a href="{{route('edit-user', ['user' => $user])}}">Editar</a>
						
					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

	</div>

@endsection
