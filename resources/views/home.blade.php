@extends('layouts.master')
@section('content')
        <!-- profile head start-->
<div class="profile-hero">
    <div class="profile-intro">
        <img src="img/img1.jpg" alt=""/>
        <h1>Dave Gomache</h1>
        <span>Welcome back, Dave!. You have X new events to bet on. You are currently ranked #21 of #419 in Nordea! </span>

    </div>

    <div class="profile-value-info">

            <a class="btn btn-lg btn-success btn-block" href="{{ url('/mybets') }}">Let me bet!</a>

    </div>
</div>
<!-- profile head end-->

@endsection
