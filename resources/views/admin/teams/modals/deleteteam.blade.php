 <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Team</h4>
                </div>
                <div class="modal-body">
                    <h5>Are you sure, you want to delete this team?</h5>
                    <form method="POST" action="{{ url('admin/teams/delete') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" >
                        <input type="submit" class="btn btn-primary" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>