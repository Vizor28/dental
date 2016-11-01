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
                                <td data-toggle="collapse" href="#collapse_{{ $thooth->id }}" aria-expanded="false" aria-controls="collapse_{{ $thooth->id }}" data-parent="#theeth_change">

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


        <div class="panel-group mTop30" id="theeth_change" role="tablist" aria-multiselectable="true">

            @foreach($theeth_change as $change)

            <div class="panel panel-default mTop10">
                <div class="panel-heading change_{{ $change->status_id }}" role="tab" id="heading_{{ $change->thooth_id }}">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#theeth_change" href="#collapse_{{ $change->thooth_id }}" aria-expanded="false" aria-controls="collapse_{{ $change->thooth_id }}">
                            {{ $change->thooth->name }} - изменение: {{ $change->status->name }}
                        </a>
                    </h4>
                </div>
                <div id="collapse_{{ $change->thooth_id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_{{ $change->thooth_id }}">
                    <div class="panel-body">
                        <div class="change_date">
                            {{ $change->date }}
                        </div>
                        <div class="change_text">
                            {{ $change->text }}
                        </div>

                    </div>
                </div>
            </div>
            <script>
                $("#thooth_{{ $change->thooth_id }}").find("svg path").attr('fill',change_status[{{ $change->status_id }}]);
            </script>
            @endforeach
        </div>


    @endif

@endsection
