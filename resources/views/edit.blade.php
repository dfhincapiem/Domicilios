@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Edit Information</h1></br>
    <form class="row" action="{{route('edit.update', $user->id)}}" method="POST">
    {!! method_field('PUT') !!}
    {{ csrf_field() }}

        <div class="col-md-3">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
  
                <label for="formGroupExampleInput2">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">
       
                <label for="formGroupExampleInput2">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
            <br/>
            <input type="submit" value="Submit" />
        </div>
    </form>
</div>
@endsection