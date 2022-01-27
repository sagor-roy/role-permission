@extends('layouts.frontend')

@section('content')
<!-- Page content-->
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title">Profile</h4>
                </div>
                <div class="card-body">
                   <ul>
                       <li>Name : {{Auth::user()->name}}</li>
                       <li>Email : {{Auth::user()->email}}</li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection