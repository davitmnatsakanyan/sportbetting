@extends('admin.layouts.master')
@section('content')
<table class="table table-bordered">
    <thead>
        <th>Date</th>
        <th>Match</th>
        <th>Result</th>
    </thead>
    @if(isset($matches))
    @foreach($matches as $match)
    <tr>
        <td>{{ $match->date }}</td>
        <td><strong>{{ $match->team1}}</strong> vs <strong>{{ $match->team2 }}</strong></td>
        <td></td>
    </tr>
    @endforeach
    @endif
</table>

<button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Add Match
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New Match</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/matches/store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <select name="team1"  class="form-control">
                            <option value="">Select team</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                        <span>vs</span>
                        <select name="team2"  class="form-control">
                            <option value="">Select team</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="date" name="date" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add">
                </form>
            </div>
        </div>
    </div>
</div>



@endsection