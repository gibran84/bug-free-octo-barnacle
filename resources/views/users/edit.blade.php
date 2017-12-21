@extends ('layouts.master') @section('body')

<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">

		<div class="pull-left" style="padding: 14px; font-weight: bold">Actualizar
			Usuario</div>

	</div>

	<div class="panel-body">

		<div class="row">

			<div class="col-md-6">

				{{ Form::model( $user, [ 'url' => route('update-user', ['user' =>
				$user]), 'class' => 'form-horizontal', 'method' => 'put' ] ) }}

					{{csrf_field()}} @include('layouts.errors')


					<div
						class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-group-sm">
						{{ Form::label('name', 'Nombre', ['class' => 'col-md-4
					control-label', 'for' => 'name']) }}

						<div class="col-md-6">
							{{ Form::text('name', null, ['class' => 'form-control']) }} 
							
							@if ($errors->has('name')) <span class="help-block"> <strong>{{
									$errors->first('name') }}</strong>
							</span> @endif
						</div>
					</div>

					<div
						class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-group-sm">
						<label for="email" class="col-md-4 control-label">E-Mail Address</label>

						<div class="col-md-6">
						
						{{ Form::text('email', null, ['class' => 'form-control', 'type' => 'email']) }}
						
							 @if ($errors->has('email'))
							<span class="help-block"> <strong>{{ $errors->first('email') }}</strong>
							</span> @endif
						</div>
					</div>

					<div class="form-group form-group-sm">

						{{ Form::label('placeId', 'Lugares', ['class' => 'col-md-4
						control-label', 'for' => 'placeId']) }}

						<div class="col-md-6">{{ Form::select('places[]', $places, null,
							['class' => 'form-control', 'multiple' => 'multiple']) }}</div>

					</div>

					<div class="form-group form-group-sm">

						<div class="col-md-offset-4 col-md-6">

							<button type="submit" class="btn btn-default btn-sm">Guardar</button>

						</div>

					</div>

				{{ Form::close() }}

			</div>

		</div>

	</div>

</div>


@endsection
