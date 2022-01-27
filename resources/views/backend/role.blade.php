@extends('layouts.backend')

@section('content')
<div class="main_content">
    <!-- content area -->
    <div class="container-fluid">
        <!-- breadcame start -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><span
                                            class="p-1 text-sm text-light bg-success rounded-circle"><i
                                                class="fas fa-home"></i></span> Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Role Permission
                                </li>
                                <a href="#roleModal" data-toggle="modal" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus-circle"></i>
                                    Add Role</a>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- data table start -->
        <div class="data_table my-4">
            <div class="content_section">
                <table id="example" class="table text-center table-striped table-bordered table-responsive-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->section}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Role Permission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.role-store')}}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Role Name</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Enter role name....">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row my-3">
                                    <div class="col-7 text-right">
                                        <label for="name"><span class="font-weight-bold">About</span></label>
                                    </div>
                                    <div class="col-5">
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="about">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row my-3">
                                    <div class="col-7 text-right">
                                        <label for="name"><span class="font-weight-bold">Contact</span></label>
                                    </div>
                                    <div class="col-5">
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="contact">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row my-3">
                                    <div class="col-7 text-right">
                                        <label for="name"><span class="font-weight-bold">Staff</span></label>
                                    </div>
                                    <div class="col-5">
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="staff">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row my-3">
                                    <div class="col-7 text-right">
                                        <label for="name"><span class="font-weight-bold">Role</span></label>
                                    </div>
                                    <div class="col-5">
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="role">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection