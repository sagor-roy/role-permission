@extends('layouts.frontend')

@section('content')
<!-- Page content-->
<div class="container my-5">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-6 offset-md-3">
           <div class="card">
               <div class="card-header text-center">
                   <h4 class="card-title">Login</h4>
               </div>
               <div class="card-body">
                   <div class="row mb-3">
                       <div class="col-md-6 my-1">
                           <a href="{{route('login.google')}}" class="btn btn-danger d-block"><i class="fab fa-google"></i> Login with google</a>
                       </div>
                       <div class="col-md-6 my-1">
                           <a href="{{route('login.github')}}" class="btn btn-info d-block"><i class="fab fa-github"></i> Login with github</a>
                       </div>
                       <div class="col-md-6 my-1">
                           <a href="{{route('login.facebook')}}" class="btn btn-primary d-block"><i class="fab fa-facebook"></i> Login with facebook</a>
                       </div>
                   </div>
                   <form action="{{route('login')}}" method="POST">
                       @csrf
                       <div class="form-group mb-3">
                           <label class="mb-1">Email</label>
                           <input type="text" class="form-control" name="email">
                       </div>
                       <div class="form-group mb-3">
                           <label class="mb-1">Password</label>
                           <input type="password" class="form-control" name="password">
                       </div>
                       <button class="btn btn-sm btn-primary" type="submit">Login</button>
                   </form>
                   <br>
                   <span>You don't have account ? <a href="{{route('register')}}">Register</a></span>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection