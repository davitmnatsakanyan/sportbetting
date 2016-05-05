@extends('layouts.master')
@section('content')
    <button class="btn btn-warning">Let's bet</button>
    </br>
    </br>
    </br>
   <ul>
       @if(count($matches)>0)
           <table class="table table-bordered">

           @foreach($matches as $match)
               @if($match->user_id == Auth::user()->id)
                   @if($match->pick != 0)
                       <tr>
                           <td><span><label class="{{$match->pick == $match->team1_id ? 'label label-primary' :  'label label-default'}}">{{ $match->team1 }}</label></span> {{ $match->pick == $match->team1_id ? '>' : '<' }} <span><label class="{{$match->pick == $match->team2_id ? 'label label-primary' :  'label label-default'}}">{{ $match->team2 }}</label></span></td>
                           <td><span>Bet Placed</span></td>
                       </tr>
                   @else
                       <tr>
                            <td><span><label class="label label-primary">{{ $match->team1 }}</label></span> = <span><label class="label label-primary">{{ $match->team2 }}</label></span></td>
                           <td><span>Bet Placed</span> </td>
                       </tr>
                   @endif
               @else
                   <tr>
                        <td><span><label class="label label-default">{{ $match->team1 }}</label></span> ? <span><label class="label label-default">{{ $match->team2 }}</label></span></td>
                       <td><span>Not Placed!</span> </td>
                   </tr>
               @endif
           @endforeach

           </table>
       @endif
   </ul>

@endsection