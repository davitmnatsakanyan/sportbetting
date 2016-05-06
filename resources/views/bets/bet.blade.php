@extends('layouts.master')
@section('content')
@if(count($matches)>0)
    <form method="POST" action="{{url('bets/bet')}}">
        {{ csrf_field() }}
        <ul>
        @foreach($matches as $match)
            <li>
            <span><label class="label label-default">{{ $match->team1 }} - {{ $match->point1 }} Pts</label><input type="radio" name="pick" value="{{ $match->team1_id }}"> </span>
            <span><label class="label label-default">X - {{ $match->draw }} Pts</label><input type="radio" name="pick" value="0"> </span>
            <span><label class="label label-default">{{ $match->team2 }} - {{ $match->point2 }} Pts</label><input type="radio" name="pick" value="{{ $match->team2_id }}"> </span>
            <input type="hidden" name="match_id" value="{{ $match->id }}">
            </li>
        @endforeach
        </ul>
        <input type="submit" value="Bet" class="btn bg-success">
    </form>
@endif
@endsection