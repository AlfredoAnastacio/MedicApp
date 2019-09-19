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
            <form action="{{ route('specialties.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">Nombre de la especialidad:</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingresa el nombre de la especialidad">
                </div>
                <div class="form-group">
                    <label for="name">Descripción: </label>
                    <input type="text" name="description" class="form-control" placeholder="Ingresa la descripción de la especialidad">
                </div>
                <div class="text-center">
                    <a href="{{ route('specialty.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
