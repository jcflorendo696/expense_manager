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

                    <form action="/myaccount" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-6 offset-md-3">
                            <div class="form-group">
                                <label for="accountName">Name</label>
                                <input type="text" name="txtAccountName" id="accountName" value="{{ $myaccount->name}}" class="form-control form-control-sm" disabled>
                            </div>
                            
                            <div class="form-group">
                                <label for="accountEmail">Email</label>
                                <input type="text" name="txtAccountEmail" id="accountEmail" value="{{ $myaccount->email}}" class="form-control form-control-sm" disabled>
                            </div>
                        
                            
                            <div class="row"> 
                                <div class="form-group col-md-4">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="txtPwEditable" onclick="isEditable()">
                                        <label class="form-check-label" for="exampleCheck1">Edit Password</label>
                                    </div>
                                </div>        

                                <div class="form-group  col-md-8">
                                    <input type="password" name="password" id="memberPassField" minlength="10" maxlength="30" value="{{ $myaccount->password}}" class="form-control form-control-sm @error('password') is-invalid @enderror" disabled>
                                </div>                
                            </div>
                            <div class="form-group">
                                <button id="btnMemberChangePass" type="submit" class="btn btn-primary btn-sm" value="Edit"> Submit</button>
                            </div>
                        </div>

                        @error('password')
                        <div class="row">
                            <div class="form-group col-md-4 offset-md-4 alert alert-danger alert-dismissible fade show">
                                <div>{{ $message }}</div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @enderror   
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
