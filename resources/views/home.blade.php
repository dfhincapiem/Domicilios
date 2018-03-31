@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    YOU CAN EDIT THE <SPAN>INFORMATION OF YOUR ACCOUNT BY CLICKING ON YOUR NAME</SPAN>
                    AT THE TOP OF THE PAGE
                    </br>
                    </br>
                    @if(Auth::user()->hasRole('admin'))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Id</th>
                                    <th class="col-md-1">Name</th>
                                    <th class="col-md-1">Phone</th>
                                    <th class="col-md-2">E-Mail</th>
                                    <th class="col-md-1">User</th>
                                    <th class="col-md-1">Agent</th>
                                    <th class="col-md-1">Admin</th>
                                    <th class="col-md-1">Is Active?</th>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1"></th>
                                    <th class="col-md-1"></th>
                                    
                                </tr>
                            </thead>
                        </table>
                        
                        @foreach($users as $user)
                            <form action="{{route('home.update', $user->id)}}" method="POST">
                                    {!! method_field('PUT') !!}
                                <table class="table">

                                    <tbody>
                                        <tr>
                                <td class="col-md-1" scope="row">{{ $user->id }}</td></th>                                
                                <td class="col-md-1"><input readonly class="form-control" type="text" name="name" value="{{ $user->name }}" ></td>
                                <td class="col-md-1"><input readonly class="form-control" type="text" id="phone" name="phone" value="{{ $user->phone }}" ></td>
                                <td class="col-md-2"> <input readonly class="form-control" type="text" name="email" value="{{ $user->email }}" ></td>
                                <td class="col-md-1"><input disabled type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                                <td class="col-md-1"><input disabled type="checkbox" {{ $user->hasRole('Agent') ? 'checked' : '' }} name="role_agent"></td>
                                <td class="col-md-1"><input disabled type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                <td class="col-md-1"><input disabled type="checkbox" {{ $user->user_active ? 'checked' : '' }} name="user_active"></td>
                                {{ csrf_field() }}
                                <td class="col-md-1"><button type="submit" value="{{ $user->id }}" form="{{ $user->id }}">Del</button></td>
                                <td class="col-md-1"><button id="edit" onclick="remove()">Edit</button></td>
                                <td class="col-md-1"><button type="submit" value="{{ $user->id }}">Save</button></td>
                                
                                
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <form action="{{route('home.destroy', $user->id)}}" id="{{ $user->id }}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{csrf_field()}}
                            </form>
                            
                     
                        @endforeach
                        <button onclick="mostrar()">Crear Usuario</button>
                        <form class="nuevousuario" action="{{route('home.update', $user->id)}}" method="POST">
                                {!! method_field('PUT') !!}
                            <table class="table">

                                <tbody>
                                    <tr>
                            <td class="col-md-1" scope="row">{{ $user->id }}</td></th>                                
                            <td class="col-md-1"><input readonly class="form-control" type="text" name="name" value="{{ $user->name }}" ></td>
                            <td class="col-md-1"><input readonly class="form-control" type="text" id="phone" name="phone" value="{{ $user->phone }}" ></td>
                            <td class="col-md-2"> <input readonly class="form-control" type="text" name="email" value="{{ $user->email }}" ></td>
                            <td class="col-md-1"><input disabled type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                            <td class="col-md-1"><input disabled type="checkbox" {{ $user->hasRole('Agent') ? 'checked' : '' }} name="role_agent"></td>
                            <td class="col-md-1"><input disabled type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                            <td class="col-md-1"><input disabled type="checkbox" {{ $user->user_active ? 'checked' : '' }} name="user_active"></td>
                            {{ csrf_field() }}
                            <td class="col-md-1"><button type="submit" value="{{ $user->id }}" form="{{ $user->id }}">Del</button></td>
                            <td class="col-md-1"><button id="edit" onclick="remove()">Edit</button></td>
                            <td class="col-md-1"><button type="submit" value="{{ $user->id }}">Save</button></td>
                            
                            
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                            
                    @endif
            
                        
                  
           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
