@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Gestionar horario</h3>
                </div>
                <div class="col text-right">
                    <a href=" {{route('doctors.create')}} " class="btn btn-sm btn-success">Guardar cambios</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('notification'))
                    <div class="alert alert-success role="alert"">
                    {{ session('notification') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light text-center">
                    <tr>
                        <th scope="col"><strong>Día</strong></th>
                        <th scope="col"><strong>Activo</strong></th>
                        <th scope="col"><strong>Turno mañana</strong></th>
                        <th scope="col"><strong>Turno tarde</strong></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @for ($i = 0; $i <7 ; $i++)
                        <tr>
                            <th>Día {{ $i }}</th>
                            <td></td>
                            <td> - </td>
                            <td> - </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
