@extends('layouts.frontend')

@section('content')
<!-- Page content-->
<div class="container my-5">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-md-6 offset-md-3">
           <div class="card">
               <div class="card-header text-center">
                   <h4 class="card-title">Register</h4>
               </div>
               <div class="card-body">
                   <form action="{{route('register.store')}}" method="POST">
                       @csrf
                       <div class="form-group mb-3">
                           <label class="mb-1">Name</label>
                           <input type="text" class="form-control" name="name">
                       </div>
                       <div class="form-group mb-3">
                           <label class="mb-1">Email</label>
                           <input type="text" class="form-control" name="email">
                       </div>
                       <div class="form-group mb-3">
                           <label class="mb-1">Password</label>
                           <input type="password" class="form-control" name="password">
                       </div>
                       <div class="form-group mb-3">
                           <label class="mb-1">Confirm Password</label>
                           <input type="password" class="form-control" name="password_confirmation">
                       </div>
                       <button class="btn btn-sm btn-primary" type="submit">Register</button>
                   </form>
                   <br>
                   <span>You have already account ? <a href="{{route('index.login')}}">Login</a></span>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection