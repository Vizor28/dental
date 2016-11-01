@extends('layouts.app')

@section('content')

    <div class="theeth_block mTop20">

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


@endsection