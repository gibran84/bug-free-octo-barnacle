@extends ('layouts.master') 

@section('body')

	<div class="panel panel-default">

		<div class="panel-heading" style="padding: 0; min-height:50px">
		
			<div class="pull-left" style="padding: 14px; font-weight:bold">Lista de Grupos</div>

			<div class="collapse navbar-collapse"
				id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				
					@can('create-group')
				
					<li><a href="{{route('create-group')}}">+ Agregar</a></li>
					
					@endcan
					
				</ul>
			</div>

		</div>

		<table class="table">

			<thead>

				<tr>

					<th>#</th>

					<th>Nombre</th>
					
					<th>Lugar</th>

					<th>Creado</th>
					
					<th></th>

				</tr>

			</thead>

			<tbody>

				@foreach ($groups as $group)
				
				<tr>

					<td>{{ $group->id }}</td>

					<td>{{ $group->name }}</td>
					
					<td>{{ $group->getRelation('place')->name }}</td>

					<td>{{ $group->created_at }}</td>
					
					<td>
					
						@can('show-groups')
						
    					<a href="{{route('show-group', ['group' => $group])}}">Ver</a>
    					
    					@endcan
    					
    					@can('edit-group')
    					
    					<a href="{{route('edit-group', ['group' => $group])}}">Editar</a>
    					
    					@endcan
    					
					</td>

				</tr>

				@endforeach

			</tbody>

		</table>

	</div>

@endsection
