$(document).ready(function () {
    $('.editteam').on('click', function(){
        var id=$(this).data('id');
        var name=$(this).data('name');
        var short_name=$(this).data('short_name');
        var logo=$(this).data('logo');

        $('#editModal').find('input[name="id"]').val(id);
        $('#editModal').find('input[name="name"]').val(name);
        $('#editModal').find('input[name="team_id"]').val(id);
        $('#editModal').find('input[name="short_name"]').val(short_name);
       // $('#editModal').find('input[name="logo"]').val(logo);
    });

    $('.deleteteam').on('click', function(){
        var id=$(this).data('id');

        $('#deleteModal').find('input[name="id"]').val(id);

    });
});
