@extends('layouts.app')

@section('content')

    <div id="doctors">

        @if(isset($doctors) && !empty($doctors))
            @foreach($doctors as $doctor)
                <div class="doctor mTop20">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="doctor_name">
                                {{ $doctor->name }}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="clinic_email">
                                {{ $doctor->email }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endsection