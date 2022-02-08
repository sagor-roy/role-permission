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
                                <li class="breadcrumb-item active" aria-current="page">Creadential
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- dashboard body content -->
        <div class="dashboard my-4">
            <div class="content_section">
                <h5>Facebook</h5>
                <hr>
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Clien ID</label>
                                <input type="text" class="form-control" name="client_id"
                                    value="{{$facebook->client_id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Secret ID</label>
                                <input type="text" class="form-control" name="secret_id"
                                    value="{{$facebook->secret_id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Redirect Link</label>
                                <input type="text" class="form-control" name="redirect" value="{{$facebook->redirect}}">
                            </div>
                        </div>
                    </div>

                    <h5>Google</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Clien ID</label>
                                <input type="text" class="form-control" name="client_id" value="{{$google->client_id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Secret ID</label>
                                <input type="text" class="form-control" name="secret_id" value="{{$google->secret_id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Redirect Link</label>
                                <input type="text" class="form-control" name="redirect" value="{{$google->redirect}}">
                            </div>
                        </div>
                    </div>

                    <h5>Github</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Clien ID</label>
                                <input type="text" class="form-control" name="client_id" value="{{$github->client_id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Secret ID</label>
                                <input type="text" class="form-control" name="secret_id" value="{{$github->secret_id}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Redirect Link</label>
                                <input type="text" class="form-control" name="redirect" value="{{$github->redirect}}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end -->
    </div>
</div>
@endsection