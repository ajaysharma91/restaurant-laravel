@extends('layout')
@section('content')
<div class="col-sm-4 mr-auto">
    <h4>Edit Restaurant Details</h4>
    <form method="post" action="/edit">
    @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="id" id="id" value="{{$data->id}}">
            <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                placeholder="Enter Name" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Enter email" value="{{$data->email}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" id="address" aria-describedby="address"
                placeholder="Enter Address" value="{{$data->address}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@stop