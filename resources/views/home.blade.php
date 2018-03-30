@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                    <table>
                            <thead>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>E-Mail</th>
                            <th>User</th>
                            <th>Agent</th>
                            <th>Admin</th>
                            <th>Is Active?</th>
                            <th></th>
                            </thead>
                    <tbody>
                        @foreach($users as $user)
                        
                        <tr>
                            <form action="route('home.update')" method="post">
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Agent') ? 'checked' : '' }} name="role_agent"></td>
                                <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                <td><input type="checkbox" {{ $user->user_active ? 'checked' : '' }} name="role_admin"></td>
                                {{ csrf_field() }}
                                <td><button type="submit">Save</button></td>
                            </form>
                        </tr>
                        @endforeach
                    @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
