@extends('page.main')
@section('main-section')

@if((Session::get('isSearch')=="true") )
<style>
    #register-section{
        display: none;
    }
</style>

@endif

<section id="register-section">
<div class="register-container">
    <form class="register" action="{{url('/')}}/register" method="post">
        @csrf
        <h1>Registration</h1>
        <div class="mb-3 row">
            <label for="inputName"  class="col-4 col-form-label">Name</label>
            <div class="col-8">
                <input type="text" class="form-control" name="user_name" id="username" placeholder="Name">
                @error('user_name')<p><span style="color:red" >*enter username  </span></p>@enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName"  class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input type="mail" class="form-control" name="user_mail" id="usermail" placeholder="Email">
                @error('user_mail')<p><span style="color:red" >*enter mail-id  </span></p>@enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input type="password" class="form-control" name="user_pass" id="userpassword" placeholder="Password">
                @error('user_pass')<p><span style="color:red" >*enter password  </span></p>@enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Confirm Password</label>
            <div class="col-8">
                <input type="text" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password">
                @error('confirmpassword')<p><span style="color:red" >*password isn't matching  </span></p>@enderror
            </div>
        </div>

                <button  class="btn button" role="submit">Submit</button>


    </form>
</div>
</section>

@endsection
