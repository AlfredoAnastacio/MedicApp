@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Especialidades</h3>
                </div>
                <div class="col text-right">
                    <a href=" {{route('speciality.create')}} " class="btn btn-sm btn-success">Agregar</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($specialties as $specialty)
                        <tr>
                            <td>{{$specialty->name}}</td>
                            <td>{{$specialty->description}}</td>
                            <td>
                                <a class="btn btn-sm btn-primary">Editar</a>
                                <a class="btn btn-sm btn-danger">Eliminar</a>                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
