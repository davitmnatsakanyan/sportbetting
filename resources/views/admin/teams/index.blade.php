@extends('admin.layouts.master')
@section('content')
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Short Name</th>
            <th>Action</th>
        </thead>
        <tbody>
        @if(isset($teams))
            @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td><img src={{ 'images/teams/'.$team->icon }}></td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->short_name }}</td>
                <td>

                <button data-toggle="modal" data-target="#editModal" title='Edit' style="float: left; margin-right: 10px" class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>

                <form method="POST" action="{{ url('admin/team/'.$team->id) }}">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <button title='Delete'  type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addTeamModal">
        Add Team
    </button>

    @include('admin.teams.modals.edit')
    @include('admin.teams.modals.addteam')
@endsection