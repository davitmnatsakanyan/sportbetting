@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered">
    <thead>
        <th>Date</th>
        <th>Match</th>
        <th>Result</th>
        <th>Actions</th>
    </thead>
    @if(isset($matches))
    @foreach($matches as $match)
    <tr>
        <td>{{ $match->date }}</td>
        <td>
            <span class=" my_label label label-default">{{ $match->team1}} - {{ $match->point1 }}Pts</span>
            <span class="my_label label label-primary">X - {{ $match->draw }}Pts</span>
            <span class="my_label label label-default">{{ $match->team2 }} - {{ $match->point2 }}Pts</span>
        </td>
        <td>
            @if(is_null($match->result))

            @else
                {{ $match->result  }}
            @endif

        </td>
        <td>
            <button class="btn btn-default editmatch"
                    data-target="#editmatch"
                    data-toggle="modal"
                    data-team1_id="{{ $match->team1_id }}"
                    data-team1="{{ $match->team1 }}"
                    data-team2_id="{{ $match->team2_id }}"
                    data-team2="{{ $match->team2 }}"
                    data-match_id="{{ $match->id }}"
                    data-point1="{{ $match->point1 }}"
                    data-point2="{{ $match->point2 }}"
                    data-draw="{{ $match->draw }}"
                    data-date="{{ $match->date }}"
                    data-result="{{ $match->result }}"
                    data-score1="{{ $match->score1 }}"
                    data-score2="{{ $match->score2 }}"
                    @if(!is_null($match->result))
                    data-result_id="{{ $match->result_id }}"
                    @endif
                    >
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </button>
        </td>
    </tr>
    @endforeach
    @endif
</table>

<button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Add Match
</button>




@include('admin.matches.modals.addteam')
@include('admin.matches.modals.editmatch')
{{--@include('admin.matches.modals.setresult')--}}
@endsection