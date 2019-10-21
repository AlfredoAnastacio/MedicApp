@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Editar datos del doctor</h3>
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
            <form action=" {{route('doctors.update', $doctor->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="id_doctor" name="id_doctor" value="{{ $doctor->id }}">
                <div class="form-group">
                    <label for="name">Nombre del Médico:</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingresa el nombre del médico" required value="{{ old('name', $doctor->name)}}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email', $doctor->email) }}">
                </div>
                <div class="form-group">
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" class="form-control" placeholder="Ingresa el DNI del médico" value="{{ old('dni', $doctor->dni) }}">
                </div>
                <div class="form-group">
                    <label for="address">Dirección: </label>
                    <input type="text" name="address" class="form-control" placeholder="Ingrese una dirección" value="{{ old('address', $doctor->address) }}">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono / móvil: </label>
                    <input type="number" name="phone" class="form-control" placeholder="Ingresa un número de teléfono" value="{{ old('phone', $doctor->phone) }}">
                </div>
                <div class="form-group">
                    <label for="phone">Contraseña: </label>
                    <input type="text" name="password" class="form-control" value="">
                    <p>Ingrese un valor sí desea cambiar la Contraseña</p>
                </div>
                <div class="text-center">
                    <a href="{{ route('doctors.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
