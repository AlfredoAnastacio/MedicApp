@extends('layouts.panel')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo Médico</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action=" {{route('doctors.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">Nombre del Médico:</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingresa el nombre del médico" required value=" {{old('name')}} ">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value=" {{old('email')}} ">
                </div>
                <div class="form-group">
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" class="form-control" placeholder="Ingresa el DNI del médico" value=" {{old('dni')}} ">
                </div>
                <div class="form-group">
                    <label for="address">Dirección: </label>
                    <input type="text" name="address" class="form-control" placeholder="Ingrese una dirección" value=" {{old('address')}} ">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono / móvil: </label>
                    <input type="number" name="phone" class="form-control" placeholder="Ingresa un número de teléfono" value=" {{old('phone')}} ">
                </div>
                <div class="form-group">
                    <label for="phone">Contraseña: </label>
                    <input type="text" name="password" class="form-control" value=" {{ str_random(6) }} ">
                </div>
                <div class="form-group">
                    <label for="specialties">Especialidades</label>
                    <select name="specialties" id="specialties" class="form-control selectpicker" data-style="btn-primary" multiple title="Seleccione una o varias">
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id}}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <a href="{{ route('doctors.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@endpush
