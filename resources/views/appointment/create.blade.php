@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Nueva cita</h3>
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
                    <label for="name">Especialidad:</label>
                    <select name="specialty_id" id="specialty" class="form-control">
                        <option disabled selected>Selecciona una opción</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id}}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Médico: </label>
                    <select name="doctor_id" id="doctor" class="form-control">
                        <option disabled selected>Selecciona una opción</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha: </label>
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Seleccione una fecha" type="text" value="{{ date('Y-m-d') }}"
                            data-date-format="yyyy-mm-dd" data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="0d">
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Hora de atención: </label>
                    <input type="text" name="address" class="form-control" placeholder="Ingresa una dirección" value=" {{old('address')}} ">
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono / móvil: </label>
                    <input type="number" name="phone" class="form-control" placeholder="Ingresa un número de teléfono" value="{{old('phone')}}">
                </div>
                <div class="form-group">
                    <label for="phone">Contraseña: </label>
                    <input type="text" name="password" class="form-control" value=" {{ str_random(6) }} ">
                </div>
                <div class="text-center">
                    <a href="{{ route('patients.index')}}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script>
        let $doctor;
        $(function () {
            $doctor = $('#doctor');
            $('#specialty').change(() => {
                const specialtyId = $('#specialty').val()
                const url = `../specialties/${specialtyId}/doctors`;
                $.getJSON(url, onDoctorsLoaded);
            });
        });
        function onDoctorsLoaded(doctors){
            let htmlOptions = '';
            doctors.forEach(doctor => {
                htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`;
            });
            $doctor.html(htmlOptions);
        }
    </script>
@endpush