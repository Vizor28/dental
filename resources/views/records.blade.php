@extends('layouts.app')

@section('content')

    <div class="title">Выберете зуб который у вас болит:</div>

    <div class="theeth_block mTop20" id="records_theeth">

        <!-- <pre></pre>-->
        @if (isset($chaps) && !empty($chaps))

            <table>
                <tbody>
                @foreach($chaps as $chap=>$theeth)
                    <tr id="chap_{{ $chap }}">
                        @foreach($theeth as $thooth)
                            <td>
                                @if ($chap==2)
                                    <div class="thooth_number">
                                        {{ $thooth->id }}
                                    </div>
                                @endif
                                <div class="thooth_image" id="thooth_{{ $thooth->id }}" data-toggle="tooltip" data-placement="top" title="{{ $thooth->name }}">
                                    {!! $thooth->picture !!}
                                </div>

                                @if ($chap==1)
                                    <div class="thooth_number">
                                        {{ $thooth->id }}
                                    </div>
                                @endif

                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif

    </div>

    @if (isset($theeth_change) && !empty($theeth_change))

        <script>
            var change_status={
                '1' : 'none',
                '2' : 'rgb(0, 204, 0)',
                '3' : 'rgb(237, 117, 36)',
                '4' : 'rgba(0, 0, 0, 0.2)'
            }
        </script>


        @foreach($theeth_change as $change)
            <script>
                $("#thooth_{{ $change->thooth_id }}").find("svg path").attr('fill',change_status[{{ $change->status_id }}]);
            </script>
        @endforeach

    @endif

    <form action="{{ url('/cabinet/records') }}" method="POST" role="form">

        @if(isset($clinics) && !empty($clinics))

        <div class="form-group">
            <label for="clinic_id">Clinic</label>
            <select name="clinic_id" id="clinic_id">
                @foreach($clinics as $key=>$clinic)
                    <option value="{{ $clinic->id }}" @if (!$key) selected @endif >{{ $clinic->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="doctor_id">Doctor</label>

            <select name="doctor_id" id="doctor_id">
                @if(empty($clinics[0]->doctors->toArray()))
                    <option>Нету докторов</option>
                @else
                    @foreach($clinics[0]->doctors->toArray() as $key=>$doctor)
                        <option value="{{ $doctor->id }}" @if (!$key) selected @endif >{{ $doctor->name }}</option>
                    @endforeach

                @endif
            </select>
        </div>

        @endif

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" />
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <input type="hidden" name="thooth_id" />
        <button type="submit" class="btn btn-default">Submit</button>

    </form>


@endsection