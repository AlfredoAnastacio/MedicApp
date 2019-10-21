@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nuevo paciente</h3>
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
            <form action=" {{route('patients.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">Nombre del paciente:</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingresa el nombre del paciente" required value=" {{old('name')}} ">
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
                    <input type="text" name="address" class="form-control" placeholder="Ingresa la descripción de la especialidad" value=" {{old('address')}} ">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono / móvil: </label>
                    <input type="number" name="phone" class="form-control" placeholder="Ingresa la descripción de la especialidad" value=" {{old('phone')}} ">
                </div>
                <div class="text-center">
                    <a href="{{ route('patients.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
