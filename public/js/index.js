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

    $('.editmatch').on('click', function(){
        var team1_id=$(this).data('team1_id');
        var team1=$(this).data('team1');
        var team2_id=$(this).data('team2_id');
        var team2=$(this).data('team2');
        var match_id=$(this).data('match_id');
        var point1=$(this).data('point1');
        var point2=$(this).data('point2');
        var draw=$(this).data('draw');
        var date=$(this).data('date');
        var result=$(this).data('result');
        var result_id=$(this).data('result_id');
        var score1 = $(this).data('score1')
        var score2 = $(this).data('score2')


        $('#editmatch').find('select[name="team1"]').val(team1_id);
        $('#editmatch').find('select[name="team2"]').val(team2_id);
        $('#editmatch').find('input[name="date"]').val(date);
        $('#editmatch').find('input[name="point1"]').val(point1);
        $('#editmatch').find('input[name="point2"]').val(point2);
        $('#editmatch').find('input[name="draw"]').val(draw);
        $('#editmatch').find('input[name="match_id"]').val(match_id);

        $('#t1').html(team1);
        $('#editmatch').find('input[name="score1"]').val(score1);

        $('#t2').html(team2);
        $('#editmatch').find('input[name="score2"]').val(score2);

    })
});
