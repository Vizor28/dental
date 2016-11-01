@extends('layouts.app')

@section('content')

    <div id="clinics">

        @if(isset($clinics) && !empty($clinics))
            @foreach($clinics as $clinic)
                <div class="clinic mTop20">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="clinic_name">
                                {{ $clinic->name }}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="clinic_address">
                                {{ $clinic->address }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endsection