@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Doctores</h3>
                </div>
                <div class="col text-right">
                    <a href=" {{route('doctors.create')}} " class="btn btn-sm btn-success">Agregar</a>
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
                        <th scope="col"><strong>Nombre</strong></th>
                        <th scope="col"><strong>Email</strong></th>
                        <th scope="col"><strong>DNI</strong></th>
                        <th scope="col"><strong>Acciones</strong></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if (count($doctors) == 0)
                        <td colspan="3" class="text-center col-md-12"><strong> SIN REGISTROS </strong></td>
                    @else
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->dni}}</td>
                                <td>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a href="{{ route('specialty.edit', $doctor->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                    <input type="hidden" id="id_specialty" name="id_specialty" value="{{ $doctor->id }}">
                                    <button class="btn btn-sm btn-danger" onclick="eliminar({{ $doctor->id }})" id="eliminar">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function eliminar(id){
            Swal.fire({
                title: '¿Está seguro de eliminar este registro?',
                text: "Esta acción no se podrá deshacer!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if (result.value) {
                    var idEspecialidad = id;
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "POST",
                        url: "specialties-eliminar",
                        data:  {
                            _token: CSRF_TOKEN,
                            idEspecialidad: idEspecialidad,
                        },
                        dataType: 'JSON',
                        success: function (json) {
                            if(json.status == 'success'){
                                Swal.fire({
                                    title: json.msg,
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: json.msg,
                                    text: 'Intente de nuevo, por favor',
                                    type: 'error',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Aceptar'
                                });
                            }
                        }
                    });
                }
            });
        }
    </script>
@endpush