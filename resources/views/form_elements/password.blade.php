

@section('password')
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
@endsection