@extends ('layouts.master') @section('body')

<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">

		<div class="pull-left" style="padding: 14px; font-weight: bold">Crear
			Grupo</div>

	</div>

	<div class="panel-body">

		<div class="row">

			<div class="col-md-6">

				<form method="POST" action="/groups" class="form-horizontal">

					{{csrf_field()}} @include('layouts.errors')

					<div class="form-group form-group-sm">

						<label for="name" class="col-sm-2 control-label">Nombre</label>

						<div class="col-sm-10">

							<input type="text" name="name" class="form-control">

						</div>

					</div>

					<div class="form-group form-group-sm">

						{{ Form::label('placeId', 'Grupo', ['class' => 'col-sm-2
						control-label', 'for' => 'placeId']) }}

						<div class="col-sm-10">{{ Form::select('place_id', $comboPlaces,
							null, ['class' => 'form-control']) }}</div>

					</div>

					<div class="form-group form-group-sm">

						<div class="col-sm-offset-2 col-sm-10">

							<button type="submit" class="btn btn-default btn-sm">Guardar</button>

						</div>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>


@endsection
