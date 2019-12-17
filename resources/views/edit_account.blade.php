@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">



        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Edit New User</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    <div class="col-md-6 offset-md-3">
                        <form action="/edit_user/success" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ $user->name }}">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control form-control-sm" name="email" id="email" value="{{ $user->email }}">
                            </div>

                            <div class="row"> 
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="txtPwEditable" onclick="isEditable()">
                                        <label class="form-check-label" for="exampleCheck1">Edit Password</label>
                                    </div>
                                </div>        

                                <div class="form-group  col-md-8">
                                    <input type="password" name="password" id="memberPassField" minlength="10" maxlength="30" value="{{ $user->password}}" class="form-control form-control-sm @error('password') is-invalid @enderror" disabled>
                                </div>                
                            </div>

                            <div class="form-group">
                                <label for="name">Role</label>
                                <select name="role" id="role" class="form-control form-control-sm">
                                    <option value="admin">Administrator</option>
                                    <option value="member" {{ $user->role == 'member' ? "selected" : ""}} >Member</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Update User</button>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
