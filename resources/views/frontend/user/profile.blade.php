@extends('layouts.frontend')

@section('content')
<!-- Page content-->
<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-body">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
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