@extends('layouts.app') @section('content')
<div class="container-fluid">

	<div class="row">

		<div class="col-lg-2">

			<div class="panel panel-default">

				<div class="panel-heading">Panel Heading</div>

				@include('layouts.aside')

			</div>

		</div>
		
		<div class="col-lg-10">

			@yield('body')
		
		</div>

	</div>

</div>
@endsection
