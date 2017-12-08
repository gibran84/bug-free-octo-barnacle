
@extends ('layouts.master')

@section('title') Listar Lugares @endsection

@section('body')

    <div class="table-responsive">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Nombre</th>

                    <th>Creado</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($places as $place)
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
