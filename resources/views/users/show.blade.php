@extends ('layouts.master') @section('body')


<div class="panel panel-default">

	<table class="table">

		<tbody>

			<tr>

				<th style="width: 100px">Nombre</th>

				<td>{{$user->name}}</td>

			</tr>

			<tr>

				<th>Fecha de Creación</th>

				<td>{{$user->created_at}}</td>

			</tr>
			
			<tr>

				<th>Fecha de Actualización</th>

				<td>{{$user->updated_at}}</td>

			</tr>
			
			<tr>

				<th>Retrato</th>

				<td><img src="{{$base64Portrait}}" style="height:100px;width:100px"></td>

			</tr>
			
		</tbody>

	</table>

</div>

<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">
	
		<div class="pull-left" style="padding: 14px; font-weight:bold">Lugares</div>

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

			@foreach ($user->places as $place)
			
			<tr>

				<td>{{ $place->id }}</td>

				<td>{{ $place->name }}</td>

				<td>{{ $place->created_at }}</td>

			</tr>

			@endforeach

		</tbody>

	</table>

</div>

@endsection
