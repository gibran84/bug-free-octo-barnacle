
@extends ('layouts.master')

@section('title') Crear Lugar @endsection

@section('body')

    <div class="row">

        <div class="col-md-8 col-lg-5">

            <form method="POST" action="/places">

                {{csrf_field()}}

                <div class="form-group">

                    <label for="name">Nombre</label>

                    <input type="text" name="name" class="form-control">

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>

    </div>



@endsection