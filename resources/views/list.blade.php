@extends('layout')
@section('content')
<div class="col-sm-6 col-lg-6 mr-auto">
    <h4>List Of Restorants</h4>
    @if(Session::get('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('status')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Address</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
            @if($data->count()>0)
                @foreach($data as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->address}}</td>
                    <td><a href="delete/{{$item->id}}"><i class="fa fa-trash"></i></a> || 
                    <a href="edit/{{$item->id}}"><i class="fa fa-edit"></i></a></td>
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
    </div>

</div>
@stop