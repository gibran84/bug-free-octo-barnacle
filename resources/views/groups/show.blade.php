@extends ('layouts.master') @section('body')


<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">

		<div class="pull-left" style="padding: 14px; font-weight: bold">Ver
			Grupo</div>

	</div>
	
	<table class="table">

		<tbody>

			<tr>

				<th style="width: 100px">Nombre</th>

				<td>{{$group->name}}</td>

			</tr>
			
			<tr>

				<th>Lugar</th>
				
				<td>{{$group->place->name}}</td>

			</tr>

			<tr>

				<th>Creado</th>

				<td>{{$group->created_at}}</td>

			</tr>

		</tbody>

	</table>

</div>

@endsection
