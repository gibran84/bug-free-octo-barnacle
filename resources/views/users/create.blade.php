@extends ('layouts.master') @section('body')

<div class="panel panel-default">

	<div class="panel-heading" style="padding: 0; min-height: 50px">

		<div class="pull-left" style="padding: 14px; font-weight: bold">Crear
			Usuario</div>

	</div>

	<div class="panel-body">

		<div class="row">

			<div class="col-md-6">

				<form method="POST" action="/users" class="form-horizontal" enctype="multipart/form-data">

					{{csrf_field()}} @include('layouts.errors')
					
					
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-group-sm">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-group-sm">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('portrait') ? ' has-error' : '' }} form-group-sm">
                            <label for="portrait" class="col-md-4 control-label">Retrato</label>

                            <div class="col-md-6">
                                <input id="portrait" type="file" class="form-control" name="portrait" value="{{ old('portrait') }}" required>

                                @if ($errors->has('portrait'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('portrait') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-group-sm">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group form-group-sm">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        
					<div class="form-group form-group-sm">

						{{ Form::label('placeId', 'Lugares', ['class' => 'col-md-4
						control-label', 'for' => 'placeId']) }}

						<div class="col-md-6">{{ Form::select('places[]', $places,
							null, ['class' => 'form-control', 'multiple' => 'multiple']) }}</div>

					</div>

					<div class="form-group form-group-sm">

						<div class="col-md-offset-4 col-md-6">

							<button type="submit" class="btn btn-default btn-sm">Guardar</button>

						</div>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>


@endsection
