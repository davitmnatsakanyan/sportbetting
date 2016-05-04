 <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit team</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('admin/team') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Team Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="short_name" value="{{ old('short_name') }}" placeholder="Team Short Name">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>