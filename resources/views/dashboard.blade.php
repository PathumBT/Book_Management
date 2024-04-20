@extends('layouts.header')
@section('content')
    <style>
        .dataTable-search {
            display: none;
        }
    </style>

    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3>Book Manage Statistics</h3>
        </div>

        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">

                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Books</h6>
                                            <h6 class="font-extrabold mb-0">{{ $bookCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Users</h6>
                                            <h6 class="font-extrabold mb-0">{{ $userCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Category Type</h6>
                                            <h6 class="font-extrabold mb-0">{{ $categorieCount }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-xl-4">
                            <div class="card">

                            </div>
                        </div>

                        <div class="col-12 col-xl-8">
                            <div class="card">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                        <div class="card-body py-4 px-5">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('dashboard_theme/assets/images/faces/1.jpg') }}">

                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                                    <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        Book Details
                    </div>
                    <div class="card-body">
                        <label for="category-filter" style="font-weight: bold">Filter by Category:</label>
                        <select id="category-filter" class="form-select" style="width: 150px">
                            <option value="all">All Categories</option>
                            <option value="1">Mystery</option>
                            <option value="2">Thriller</option>
                            <option value="3">Adventure</option>
                            <option value="4">Science Fiction</option>
                            <option value="5">Horror</option>
                        </select>
                        <br>
                        <table id="table1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Book Author</th>
                                    <th scope="col" class="text-center">Price</th>
                                    <th scope="col" class="text-center">Stock</th>
                                    <th scope="col" class="text-center">Book Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $key => $item)
                                    <tr data-category="{{ $item->book_category_id }}">
                                        <th>{{ ++$key }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->author }}</td>
                                        <td class="text-center">{{ $item->price }}</td>
                                        <td class="text-center">{{ $item->stock }}</td>
                                        <td class="text-center">
                                            @if ($item->book_category_id == 1)
                                                <span class="badge bg-primary">Mystery</span>
                                            @elseif($item->book_category_id == 2)
                                                <span class="badge bg-primary">Thriller</span>
                                            @elseif($item->book_category_id == 3)
                                                <span class="badge bg-primary">Adventure</span>
                                            @elseif($item->book_category_id == 4)
                                                <span class="badge bg-primary">Science Fiction</span>
                                            @elseif($item->book_category_id == 5)
                                                <span class="badge bg-primary">Horror</span>
                                            @endif
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
    <script>
        document.getElementById('category-filter').addEventListener('change', function () {
            const category = this.value;
            const rows = document.querySelectorAll('#table1 tbody tr');

            rows.forEach(row => {
                const rowCategory = row.getAttribute('data-category');

                if (category === 'all' || category === rowCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
