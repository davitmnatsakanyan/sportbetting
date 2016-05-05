<!-- Modal -->
<div class="modal fade" id="editmatch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Match</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/matches/update') }}">
                    {{ csrf_field() }}
                    <div style="width: 50%; float: left">
                        <div class="form-group">
                            <select name="team1"  class="form-control" required>
                                <option value="">Select team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                            <span>vs</span>
                            <select name="team2"  class="form-control" required>
                                <option value="">Select team</option>
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" class="form-control" required>
                        </div>
                    </div>


                    <div style="width: 50%">
                        <hr>
                        <p>Select Points</p>
                        <div class="form-group">
                            <label>Team 1</label>
                            <input class="form-control" type="text" name="point1" required>
                        </div>
                        <div class="form-group">
                            <label>Team 2</label>
                            <input class="form-control" type="text" name="point2" required>
                        </div>
                        <div class="form-group">
                            <label>Draw</label>
                            <input class="form-control" type="text" name="draw" required>
                        </div>
                    </div>
                    <p>Set Result</p>
                    <select name="result" class="form-control">
                        <option value="">Set result</option>
                        <option id="t1"></option>
                        <option id="t2"></option>
                        <option id="draw" value="0">Draw</option>
                    </select>
                    <input type="hidden" name="match_id">
                    <input type="submit" class="btn btn-primary" value="Add">
                </form>
            </div>
        </div>
    </div>
</div>