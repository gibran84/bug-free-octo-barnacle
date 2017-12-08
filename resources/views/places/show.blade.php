
@extends ('layouts.master')

@section('title') Ver Lugar @endsection

@section('body')

    <div class="table-responsive">

        <table class="table">

            <tbody>

                <tr>

                    <th>#</th>

                    <td>{{$place->id}}</td>

                </tr>

                <tr>

                    <th>Nombre</th>

                    <td>{{$place->name}}</td>

                </tr>

                <tr>

                    <th>Creado</th>

                    <td>{{$place->created_at}}</td>

                </tr>

                <tr>

                    <th>Actualizado</th>

                    <td>{{$place->updated_at}}</td>

                </tr>

            </tbody>

        </table>

    </div>

@endsection
