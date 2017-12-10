@extends ('layouts.master') @section('body')


<div class="panel panel-default">

	<table class="table">

		<tbody>

			<tr>

				<th style="width: 100px">Nombre</th>

				<td>{{$place->name}}</td>

			</tr>

			<tr>

				<th>Fecha de Creación</th>

				<td>{{$place->created_at}}</td>

			</tr>
			
			<tr>

				<th>Creado por</th>

				<td>{{$place->user->name}}</td>

			</tr>

		</tbody>

	</table>

</div>

<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">
	
		<div class="pull-left" style="padding: 14px; font-weight:bold">Grupos</div>

	</div>

	<table class="table">

		<thead>

			<tr>

				<th>#</th>

				<th>Nombre</th>

				<th>Creado</th>

			</tr>

		</thead>

		<tbody>

			@foreach ($place->groups as $group)
			
			<tr>

				<td>{{ $group->id }}</td>

				<td>{{ $group->name }}</td>

				<td>{{ $group->created_at }}</td>

			</tr>

			@endforeach

		</tbody>

	</table>

</div>

@endsection
