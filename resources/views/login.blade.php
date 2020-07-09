@extends('layout')
@section('content')
<div class="col-sm-4 mr-auto">
    <h4>Register User Details</h4>
    <form method="post" action="login">
    @csrf
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop