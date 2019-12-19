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
                            <form action="/edit_user" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                <button class="btn btn-info btn-sm" title="Edit User" name="id" value="{{ $accounts->id }}"><i class="fas fa-user-edit"></i> Edit User</button>

                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                </button> -->

                            </form>                        
                            <form action="/accounts" method="post" style="display: inline;">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm" title="Delete User" name="btnDelete" value="{{ $accounts->id }}"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{ $accounts->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
