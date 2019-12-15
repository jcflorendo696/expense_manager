@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">



        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Accounts <a href="/create_user"/><button class="btn btn-primary btn-sm">Create User</button></a></div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif




                    <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach($accounts as $accounts)
                        <tr>
                            <td>
                                {{ $accounts->name}} 
                            </td>

                            <td>
                                {{ $accounts->role }}
                            </td>

                            <td>
                                {{ $accounts->email }}
                            </td>

                            <td>
                                <button class="btn btn-info btn-sm" title="Edit User"><i class="fas fa-user-edit"></i></button>
                                <button class="btn btn-danger btn-sm" title="Delete User"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
