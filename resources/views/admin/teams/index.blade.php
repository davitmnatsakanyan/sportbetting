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
                <td><img src={{ 'images/teams/'.$team->logo }}></td>
                <td>{{ $team->name }}</td>
                <td>{{ $team->short_name }}</td>
                <td>

                <button  data-id="{{ $team->id }}" data-name="{{ $team->name }}" data-logo="{{ $team->logo }}" data-short_name="{{ $team->short_name }}" data-toggle="modal" data-target="#editModal" title='Edit' style="float: left; margin-right: 10px" class="btn btn-default editteam">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button data-id="{{ $team->id }}" data-toggle="modal" data-target="#deleteModal" title='Delete' class="btn btn-default deleteteam">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>

                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <button  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addTeamModal">
        Add Team
    </button>

    @include('admin.teams.modals.deleteteam')
    @include('admin.teams.modals.edit')
    @include('admin.teams.modals.addteam')
@endsection