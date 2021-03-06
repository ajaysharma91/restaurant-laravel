@extends('layout')
@section('content')
<div class="col-sm-4 mr-auto">
    <h4>Register User Details</h4>
    <form method="post" action="register">
    @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" id="password" aria-describedby="password"
                placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" id="address" aria-describedby="address"
                placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control" id="contact" aria-describedby="contact"
                placeholder="Enter Contact">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop