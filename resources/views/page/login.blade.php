@extends('page.main')
@section('main-section')
@if((Session::get('isSearch')=="true") )
<style>
    #details-section{
        display: none;
    }
</style>

@endif
<section id="login-section">
<div class="login-container">
    <form class="login" action="{{url('/')}}/login" method="post">
        @csrf
    <h1>Login</h1>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input type="mail" class="form-control" name="user_mail" id="usermail" placeholder="Email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input type="password" class="form-control" name="user_password" id="userpassword" placeholder="Password">
            </div>
        </div>
        <div class="submit_container rounded">
            <button  class="btn button rounded" href="#" type="submit">Submit</button>
            <a href="#"><p>Forgot password<p></a>
            <p>Don't have an Account</p>
            <a href="{{url('/')}}/register"><p>Register<p></a>
        </div>
        </div>

    </form>
</div>
</section>
@endsection
