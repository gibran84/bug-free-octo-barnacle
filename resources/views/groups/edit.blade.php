@extends ('layouts.master') @section('body')

<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">

		<div class="pull-left" style="padding: 14px; font-weight: bold">Editar
			Grupo</div>

	</div>

	<div class="panel-body">

		<div class="row">

			<div class="col-md-6">

					
					{{ Form::model(
					
					$group, 
					[
					
						'url' => route('update-group', ['group' => $group]),
						'class' => 'form-horizontal',
						'method' => 'put'
					
					]
					
					) }}
					
					@include('layouts.errors')

					<div class="form-group form-group-sm">

						{{ Form::label('name', 'Nombre', ['class' => 'col-sm-2 control-label', 'for' => 'name']) }}
						
						<div class="col-sm-10">
						
							{{ Form::text('name', null, ['class' => 'form-control']) }}
						
						</div>

					</div>
					
					<div class="form-group form-group-sm">

						{{ Form::label('id_group', 'Grupo', ['class' => 'col-sm-2 control-label', 'for' => 'idGroup']) }}
						
						<div class="col-sm-10">
						
							{{ Form::select('id_group', $comboPlaces, null, ['class' => 'form-control']) }}
						
						</div>

					</div>

					<div class="form-group form-group-sm">

						<div class="col-sm-offset-2 col-sm-10">

							{{ Form::button('Guardar', ['class' => 'btn btn-default btn-sm', 'type' => 'submit']) }}

						</div>

					</div>

				{{ Form::close() }}

			</div>

		</div>

	</div>

</div>


@endsection
