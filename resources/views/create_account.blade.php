@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">



        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create New User</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    <div class="col-md-6 offset-md-3">
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name">
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="name">Password</label>
                                <input type="password" class="form-control form-control-sm" name="password" id="password">
                            </div>

                            <div class="form-group">
                                <label for="name">Role</label>
                                <select name="role" id="role" class="form-control form-control-sm">
                                    <option value="admin">Administrator</option>
                                    <option value="member">Member</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Register User</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
