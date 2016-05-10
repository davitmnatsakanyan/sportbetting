@extends('layouts.master')
@section('content')
        <!-- profile head start-->


<div class="profile-hero">
    <div class="profile-intro">
        <div class="container-fluid mybets">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                <span>
                    You have placed all available bets, well done!
                New bets will be available on Monday 10:00!
                </span>
                </div>

                <div class="col-md-12 col-xs-12">
                    <div class="mybets-bnt col-md-3">
                        <a class="btn btn-lg btn-success btn-block" href="{{ url('/mybets') }}">Let's bet!</a>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <h2>Matches on Monday, June 10th</h2>

                    <hr>
                </div>

                <div class="col-md-12 col-xs-12 bet">
                    <div class="col-md-4 col-xs-4">
                        <div class="img-bet">
                            <img src="img/flag/us_flag.jpg" alt="">
                            <label for="success">US</label>
                        </div>

                    </div>
                    <div  class="col-md-1 col-xs-1">
                        <div class="img-bet">
                        <div> > </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="img-bet">
                            <img src="img/flag/us_flag.jpg" alt="">
                            <label for="info-t">SE</label>
                        </div>

                    </div>
                    <div  class="col-md-3 col-xs-3">
                        <div class="img-bet">
                            <span class="bet_placed"><i class="fa fa-check"></i></span>Bet placed
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xs-12 bet">
                    <div class="col-md-4 col-xs-4">
                        <div class="img-bet">
                            <img src="img/flag/us_flag.jpg" alt="">
                            <label for="success">US</label>
                        </div>

                    </div>
                    <div  class="col-md-1 col-xs-1">
                        <div class="img-bet">
                            <div> > </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="img-bet">
                            <img src="img/flag/us_flag.jpg" alt="">
                            <label for="info-t">SE</label>
                        </div>

                    </div>
                    <div  class="col-md-3 col-xs-3">
                        <div class="img-bet">
                            <span class="bet_placed"><i class="fa fa-check"></i></span>Bet placed
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xs-12 bet">
                    <div class="col-md-4 col-xs-4">
                        <div class="img-bet">
                            <img src="img/flag/us_flag.jpg" alt="">
                            <label for="success">US</label>
                        </div>

                    </div>
                    <div  class="col-md-1 col-xs-1">
                        <div class="img-bet">
                            <div> ? </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <div class="img-bet">
                            <img src="img/flag/us_flag.jpg" alt="">
                            <label for="info-t">SE</label>
                        </div>

                    </div>
                    <div  class="col-md-3 col-xs-3">
                        <div class="img-bet">
                            <span class="not_placed"><i class="fa fa-check"></i></span>Not placed
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-xs-12">
                    <h2>Matches on Monday, June 11th</h2>

                    <hr>
                </div>

            </div>

        </div>
    </div>


</div>
<!-- profile head end-->

@endsection