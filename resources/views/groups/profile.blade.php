@extends('layouts.master')
@section('content')
    @if(count($group)>0)
        @foreach($group as $g)
            <p><i>Croup Name:</i>  <strong>{{ $g->name }}</strong></p>
            <p><i>Croup Desvription:</i>  <strong>{{ $g->description }}</strong></p>
            @if($g->user_id == Auth::user()->id)
                <a href="#">Edit Group</a>
            @else
                <p>Creator: <strong>{{ $g->creator }}</strong></p>
            @endif
        @endforeach
        <p>Members</p>
        <ul>
        @foreach($members as $member)
            <li>{{ $member->name }}</li>
        @endforeach
        </ul>
        <a href="" class="btn btn-success">Invite users</a>
    @endif
@endsection