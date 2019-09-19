@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nueva especialidad</h3>
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
            <form action="{{ route('specialty.update', $specialty->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="id_specialty" name="id_specialty" value="{{ $specialty->id }}">
                <div class="form-group">
                    <label for="name">Nombre de la especialidad:</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingresa el nombre de la especialidad" required value="{{ old('name', $specialty->name) }}">
                </div>
                <div class="form-group">
                    <label for="name">Descripción: </label>
                    <input type="text" name="description" class="form-control" placeholder="Ingresa la descripción de la especialidad" value="{{ old('description', $specialty->description) }}">
                </div>
                <div class="text-center">
                    <a href="{{ route('specialty.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
