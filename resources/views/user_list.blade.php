@extends('layouts.header')

@section('content')

<div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>User Management</h3>
                    <p class="text-subtitle text-muted">Input User Imformation.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Management</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <form role="form" method="POST" action="{{ url('create_users') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="">
                        <h4>Enter User Details</h4>
                    </div>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <strong>{{ \Session::get('success') }}</strong>
                        </div>
                    @endif
                    @if (\Session::has('delete'))
                        <div class="alert alert-danger">
                            <strong>{{ \Session::get('delete') }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="col-12 col-md-6">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>User Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" class="form-control" name="email" placeholder="User Email">
                                    </div>
                                    <div class="col-md-4">
                                        <label>User Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="name" placeholder="User Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>NIC</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="nic" placeholder="NIC">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <input value="Add User" type="Submit" class="btn btn-primary"
                        class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                </div>
            </form>
        </section>
    </div>
  </div>
    <div id="main">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    User Details
                </div>
                <div class="card-body">
                    <table id="table1" class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User E-mail</th>
                                <th>NIC</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="name">{{ $item->name }}</td>
                                    <td class="email">{{ $item->email }}</td>
                                    <td class="nic">{{ $item->nic }}</td>
                                    <td class="phone">{{ $item->phone }}</td>
                                    <td class="address">{{ $item->address }}</td>
                                    <td class="text-center">
                                        @if ($item->role == 1)
                                            <span class="badge bg-danger">Admin</span>
                                        @else
                                            <span class="badge bg-success">Customer</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="/deleteUser/{{ $item->id }}"
                                            onclick="return confirm('Are you sure to want to delete it?')"><span
                                                class="badge bg-danger"><i class="bi bi-trash"></i></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
