@extends('layouts.header')
@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                    <h3>Book Borrow</h3>
                    <p class="text-subtitle text-muted">Input Book Borrow imformation.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard </a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Borrow</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
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
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-content">
                <div class="card-body">
                    <div class="tab-content text-justify">
                        <section class="section">
                            <div class="card">
                                <div class="card-header">
                                Book Borrow Details
                                </div>
                                <div class="card-body">
                                    <table id="table1" class="table table-striped" id="table1">
                                        <thead>
                                            <tr>
                                            <th scope="col">Return ID</th>
                                                    {{-- <th scope="col">Book ID</th> --}}
                                                    <th scope="col">User ID</th>
                                                    <th scope="col">User Name</th>
                                                    <th scope="col">Book Name</th>
                                                    <th  class="text-center" scope="col">Status</th>
                                                    <th scope="col">Issued Date</th>
                                                    <th  class="text-center" scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($book_users as $key => $item)
                                                    <tr class="bookRow" data-category="{{ $item->id }}">
                                                        <th class="id">{{ $item->id }}</th>
                                                        {{-- <td class="title">{{ $item->book_id }}</td> --}}
                                                        <td class="author">{{ $item->user_id }}</td>
                                                        <td class="price">{{ $item->name }}</td>
                                                        <td class="stock">{{ $item->issued_at }}</td>
                                                        <td class="stock">
                                                            @if ($item->returned == '0')
                                                                <span class="badge bg-primary">Issued Book</span>
                                                            @endif
                                                        </td>
                                                        <td class="stock">{{ date('Y-m-d', strtotime($item->issued_at)) }}</td>
                                                        <td class="stock">
                                                            <a href="/return-book/{{ $item->id }}"
                                                                onclick="return confirm('Are you sure to want to return it?')">
                                                                <span class="badge bg-danger">
                                                                    Return Book Now
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
