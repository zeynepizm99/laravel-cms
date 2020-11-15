@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="box-header">
                        <h3 class="box-title">Users List</h3>

                        <a href="/admin/users/create" class="btn btn-primary float-left">Add new user</a>
                    </div>
                </div>
                <table class="table table-hover">
                    <tbody><tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>

                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href=" /admin/users/{{$user->id}}/edit " class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>

                                <a href="  " class="btn btn-danger btn-sm"    onclick="event.preventDefault();
                                  return confirm('Are you sure you want to delete this user')? $(this).find('.delete-form').submit(): '' ;">>
                                    <i class="fa fa-edit"></i>Delete
                                    <form class="delete-form" action="/admin/users/{{$user->id}}" method="POST" class="d-none">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </a>
                            </td>


                        </tr>
                    @endforeach

                    </tbody></table>

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- /.control-sidebar -->
@endsection
