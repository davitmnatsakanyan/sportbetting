@extends('layouts.master')
@section('content')
    <div class="panel panel-primary" style="width: 40%; margin-left: auto; margin-right: auto; text-align: center">
        <div class="panel-heading">Create Group</div>
        <div class="panel-body">
       <form  method="POST" action="{{ url('groups/create') }}">
           {{ csrf_field() }}
           <div class="form-group">
               <label>Name</label></br>
               <input class="form-control" type="text" name="name" required>
           </div>
           <div class="form-group">
               <label>Description</label></br>
               <input class="form-control" type="text" name="description" required>
           </div>
           <div class="form-group">
               <label>Private</label>
               <input type="radio" name="type" value="1">
           </div>
           <input class="btn btn-success" type="submit" value="Create">
       </form>
       </div>
    </div>
@endsection