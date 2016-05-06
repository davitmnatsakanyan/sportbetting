@extends('layouts.master')
@section('content')
    <a class="btn btn-warning" href="{{ url('groups/create') }}"> Create new group </a>
    <a class="btn btn-warning" href="#" style="margin-left: 50px"> Join more groups </a>
    @if(count($groups)>0)
        @foreach($groups as $group)

        @endforeach
    @endif
@endsection