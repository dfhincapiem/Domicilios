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
                                    <th class="col-md-1">Customer</th>
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
                            <form class="innerform" id="innerform{{$user->id}}" action="{{route('home.update', $user->id)}}" method="POST">
                                    {!! method_field('PUT') !!}
                                <table class="table" >
                                

                                    <tbody>
                                        <tr>
                                            <td class="col-md-1" scope="row">{{ $user->id }}</td></th>                                
                                            <td class="col-md-1"><input readonly class="form-control" type="text" name="name" value="{{ $user->name }}" ></td>
                                            <td class="col-md-1"><input readonly class="form-control" type="text" id="phone" name="phone" value="{{ $user->phone }}" ></td>
                                            <td class="col-md-2"> <input readonly class="form-control" type="mail" name="email" value="{{ $user->email }}" ></td>
                                            <td class="col-md-1"><input disabled type="radio" {{ $user->hasRole('customer') ? 'checked' : '' }} value="customer" name="role"></td>
                                            <td class="col-md-1"><input disabled type="radio" {{ $user->hasRole('agent') ? 'checked' : '' }} value="agent" name="role"></td>
                                            <td class="col-md-1"><input disabled type="radio" {{ $user->hasRole('admin') ? 'checked' : '' }} value="admin" name="role"></td>
                                            <td class="col-md-1"><input disabled type="checkbox" {{ $user->user_active ? 'checked' : '' }} name="user_active"></td>
                                            {{ csrf_field() }}
                                            <td class="col-md-1"><button class="btn btn-danger" type="submit" value="{{ $user->id }}" form="{{ $user->id }}">Del</button></td>
                                            <td class="col-md-1"><button class="btn btn-warning" id="edit" onclick="remove({{$user->id}})" type="button">Edit</button></td>
                                            <td class="col-md-1"><button class="btn btn-success" type="submit" value="{{ $user->id }}">Save</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <form action="{{route('home.destroy', $user->id)}}" id="{{ $user->id }}" method="POST">
                                    <input name="_method" type="hidden" value="DELETE">
                                    {{csrf_field()}}
                            </form>
                            
                     
                        @endforeach
                        <button class="btn btn-dark" onclick="mostrar()">Crear Usuario</button>
                        <form id="newform" class="nuevoUsuario" action="{{route('home.store')}}" method="POST">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="col-md-1" scope="row"><input required minlength=8 placeholder="Password"  class="form-control" type="password" name="password" ></td></th>                                
                                        <td class="col-md-1"><input required placeholder="Name"  class="form-control" type="text" name="name" ></td>
                                        <td class="col-md-1"><input placeholder="Phone"  class="form-control" type="text" id="phone" name="phone" ></td>
                                        <td class="col-md-2"> <input required placeholder="Email"  class="form-control" type="email" name="email" ></td>
                                        <td class="col-md-1"><input checked required type="radio" value="customer" name="role"></td>
                                        <td class="col-md-1"><input   type="radio" value="agent" name="role"></td>
                                        <td class="col-md-1"><input  type="radio" value="admin" name="role"></td>
                                        <td class="col-md-1"><input value="true" type="checkbox" name="user_active" checked></td>
                                        {{ csrf_field() }}
                                        <td class="col-md-3"><button type="submit" value="{{ $user->id }}" class="btn btn-success">Create</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>                            
                    @endif         
                    @if(Auth::user()->hasRole('agent'))
                    <table class="table">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Id</th>
                                    <th class="col-md-3">Name</th>
                                    <th class="col-md-2">Phone</th>
                                    <th class="col-md-2">E-Mail</th>
                                    <th class="col-md-1">Customer</th>
                                    <th class="col-md-1">Agent</th>
                                    <th class="col-md-1">Admin</th>
                                    <th class="col-md-1">Is Active?</th>
                      
                                    
                                </tr>
                            </thead>
                        </table>
                        
                        @foreach($users as $user)
                        <table class="table" >
                            <tbody>
                                <tr>
                                    <td class="col-md-1" scope="row">{{ $user->id }}</td></th>                                
                                    <td class="col-md-3">{{ $user->name }}</td>
                                    <td class="col-md-2">{{ $user->phone }}</td>
                                    <td class="col-md-2"> {{ $user->email }}</td>
                                    <td class="col-md-1"><input disabled type="radio" {{ $user->hasRole('user') ? 'checked' : '' }} value="user" name="role"></td>
                                    <td class="col-md-1"><input disabled type="radio" {{ $user->hasRole('agent') ? 'checked' : '' }} value="agent" name="role"></td>
                                    <td class="col-md-1"><input disabled type="radio" {{ $user->hasRole('admin') ? 'checked' : '' }} value="admin" name="role"></td>
                                    <td class="col-md-1"><input disabled type="checkbox" {{ $user->user_active ? 'checked' : '' }} name="user_active"></td>
                
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    @endif   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
