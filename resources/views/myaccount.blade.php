@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account Details</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    <form action="" method="post">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <label for="accountName">Name</label>
                                <input type="text" id="accountName" value="{{ $myaccount->name}}" class="form-control form-control-sm" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="accountEmail">Email</label>
                                <input type="text" id="accountEmail" value="{{ $myaccount->email}}" class="form-control form-control-sm" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="accountCreated">Account Created</label>
                                <input type="text" id="accountCreated" value="{{ $myaccount->created_at}}" class="form-control form-control-sm" disabled>
                            </div>
                            

                            <div class="form-group">
                                <label for="passField">Password</label>
                                <input type="password" name="password" id="memberPassField" value="{{ $myaccount->password}}" class="form-control form-control-sm" disabled>
                            </div>


                            <div class="form-group">
                                <button id="btnMemberChangePass" type="submit" class="btn btn-primary btn-sm" value="Edit"><i class="fas fa-user-edit"></i> Edit Password</button>
                            </div>
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
