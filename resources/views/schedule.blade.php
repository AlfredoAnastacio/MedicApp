@extends('layouts.panel')

@section('content')
    <form action=" {{ route('schedule.store')}} " method="POST">
    @csrf
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Gestionar horario</h3>
                    </div>
                    <div class="col text-right">
                        <Button type="submit" class="btn btn-sm btn-success">Guardar cambios</Button>
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
                        @foreach ($workDays as $key => $workDay)
                            <tr>
                                <th>{{ $days[$key] }}</th>
                                <td>
                                    <label class="custom-toggle">
                                        <input type="checkbox" name="active[]" value="{{ $key }}"
                                        @if ($workDay->active) checked @endif>
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select name="morning_start[]" id="" class="form-control">
                                                @for ($i = 5; $i <= 11 ; $i++)
                                                    <option value="{{ $i }}:00"
                                                    @if($i.':00 AM' == $workDay->morning_start) selected  @endif>
                                                        {{ $i}}:00 AM
                                                        </option>
                                                    <option value="{{ $i }}:30"
                                                    @if($i.':30 AM' == $workDay->morning_start) selected  @endif>
                                                        {{ $i}}:30 AM
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="morning_end[]" id="" class="form-control">
                                                @for ($i = 5; $i <= 11 ; $i++)
                                                    <option value="{{ $i }}:00"
                                                        @if($i.':00 AM' == $workDay->morning_end) selected  @endif>
                                                        {{ $i}}:00 AM
                                                        </option>
                                                    <option value="{{ $i }}:30"
                                                        @if($i.':30 AM' == $workDay->morning_end) selected  @endif>
                                                        {{ $i}}:30 AM
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select name="afternoon_start[]" id="" class="form-control">
                                                @for ($i = 4; $i <= 9 ; $i++)
                                                    <option value="{{ $i+12 }}:00"
                                                        @if($i.':00 PM' == $workDay->afternoon_start) selected  @endif>
                                                        {{ $i}}:00 pm
                                                    </option>
                                                    <option value="{{ $i+12 }}:30"
                                                        @if($i.':30 PM' == $workDay->afternoon_start) selected  @endif>
                                                        {{ $i}}:30 pm
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select name="afternoon_end[]" id="" class="form-control">
                                                @for ($i = 4; $i <= 9 ; $i++)
                                                    <option value="{{ $i+12 }}:00"
                                                        @if($i.':00 PM' == $workDay->afternoon_end) selected  @endif>
                                                        {{ $i }}:00 pm
                                                    </option>
                                                    <option value="{{ $i+12 }}:30"
                                                        @if($i.':30 PM' == $workDay->afternoon_start) selected  @endif>
                                                        {{ $i }}:30 pm
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>
@endsection
