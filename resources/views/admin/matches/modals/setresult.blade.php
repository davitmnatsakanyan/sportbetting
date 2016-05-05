<!-- Modal -->
<div class="modal fade" id="setResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Set Result</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('admin/matches/result') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Who Win</label>
                        <select class="form-control" name="result">
                            <option id="t1"></option>
                            <option id="t2"></option>
                            <option id="draw" value="0">Draw</option>
                        </select>
                        <input type="hidden" name="match_id">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Set">
                </form>
            </div>
        </div>
    </div>
</div>