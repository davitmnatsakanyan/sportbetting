@extends('layouts.master')
@section('content')
    @if(count($matches)>0)
        <table class="table table-bordered" style="text-align: center; width: 80%">
            <thead>
                <th>Team 1</th>
                <th>Score</th>
                <th>Team 2</th>
            </thead>
        @foreach($matches as $match)
            <tr>
                <td>{{ $match->team1 }}</td>
                @if(is_null($match->score1) || is_null($match->score2))
                    <td>?</td>
                @else
                    <td>{{ $match->score1 }} - {{ $match->score2 }}</td>
                @endif
                <td>{{ $match->team2 }}</td>
            </tr>
        @endforeach
        </table>
    @endif
@endsection