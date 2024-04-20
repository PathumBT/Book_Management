@extends('layouts.header')

@section('content')

<style>
        <style>.filter-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .filter-select {
            margin-right: 10px;
        }

        .filter-input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        .dataTable-input {
            display: none;
        }

        .filter-select {
            margin-right: 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5px;
        }
</style>

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
                        <h3>Book Management</h3>
                        <p class="text-subtitle text-muted">Input Book Imformation.</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Book Management</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

        <section class="section">
            <form role="form" method="POST" action="{{ route('add_bookdetails') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="">
                        <h4>Enter Book Details</h4>
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
                                        <label>Book Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="title" placeholder="Book Name">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Book Author</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="author" placeholder="Book Author">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Book Category</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select required name="category" class="form-select" style="flex: 1;">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
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
                                        <label>Price</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" class="form-control" name="price" placeholder="Price">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Stock</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" class="form-control" name="stock" placeholder="Stock">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <input value="Add Book" type="Submit" class="btn btn-primary"
                        class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                </div>
            </form>
        </section>
    </div>

    <div id="main">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Book Details
                </div>
                <div class="filter-container" style="text-align: right">
                    <select id="filterOption" class="filter-select">
                        <option value="name">Filter by Book Name</option>
                        <option value="category">Filter by Book Category</option>
                    </select>

                    <select id="categoryFilter" class="filter-select" style="display: none;">
                        <option value="">All Categories</option>
                        <option value="1">Mystery</option>
                        <option value="2">Thriller</option>
                        <option value="3">Adventure</option>
                        <option value="4">Science Fiction</option>
                        <option value="5">Horror</option>
                    </select>

                    <input type="text" id="nameFilter" class="filter-input" placeholder="Enter book name"
                        style="display: none;">
                </div>

                <div class="card-body">
                    <table id="table1" class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Book Author</th>
                                <th scope="col" class="text-center">Price</th>
                                <th scope="col" class="text-center">Stock</th>
                                <th scope="col" class="text-center">Book Category</th>
                                <th scope="col" class="text-center">Edit</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $key => $item)
                                <tr data-category="{{ $item->book_category_id }}" data-name="{{ $item->title }}">
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
                                    <td class="text-center" style="text-align: center !important">
                                        <a href="/editBook/{{ $item->id }}"><span class="badge bg-primary"><i
                                                    class="bi bi-pencil"></i></span></a>
                                    </td>
                                    <td class="text-center" style="text-align: center">
                                        <a href="/deleteBook/{{ $item->id }}"
                                            onclick="return confirm('Are you sure to want to delete it?')">
                                            <span class="badge bg-danger"><i class="bi bi-trash"></i></span>
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
    <script>
        document.getElementById('filterOption').addEventListener('change', function() {
            var selectedOption = this.value;

            if (selectedOption === 'category') {
                document.getElementById('categoryFilter').style.display = '';
                document.getElementById('nameFilter').style.display = 'none';
            } else if (selectedOption === 'name') {
                document.getElementById('categoryFilter').style.display = 'none';
                document.getElementById('nameFilter').style.display = '';
            }
        });

        document.getElementById('categoryFilter').addEventListener('change', function() {
            var category = this.value;
            var rows = document.querySelectorAll('#table1 tbody tr');

            rows.forEach(function(row) {
                var rowCategory = row.getAttribute('data-category');

                if (category === '' || rowCategory === category) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('nameFilter').addEventListener('input', function() {
            var name = this.value.trim().toLowerCase();
            var rows = document.querySelectorAll('#table1 tbody tr');

            rows.forEach(function(row) {
                var rowName = row.getAttribute('data-name').toLowerCase();

                if (rowName.includes(name)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function filterByCategory(category) {
            var rows = document.querySelectorAll('#table1 tbody tr');

            rows.forEach(function(row) {
                var rowCategory = row.getAttribute('data-category');

                if (category === '' || rowCategory === category) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function filterByName(name) {
            var rows = document.querySelectorAll('#table1 tbody tr');

            rows.forEach(function(row) {
                var rowName = row.getAttribute('data-name').toLowerCase();

                if (rowName.includes(name)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        document.getElementById('filterOption').addEventListener('change', function() {
            var selectedOption = this.value;

            if (selectedOption === 'category') {
                document.getElementById('categoryFilter').style.display = '';
                document.getElementById('nameFilter').style.display = 'none';
                filterByCategory(document.getElementById('categoryFilter').value);
            } else if (selectedOption === 'name') {
                document.getElementById('categoryFilter').style.display = 'none';
                document.getElementById('nameFilter').style.display = '';
                filterByName(document.getElementById('nameFilter').value);
            }
        });

        document.getElementById('categoryFilter').addEventListener('change', function() {
            filterByCategory(this.value);
        });

        document.getElementById('nameFilter').addEventListener('input', function() {
            filterByName(this.value.trim().toLowerCase());
        });

        var selectedOption = document.getElementById('filterOption').value;
        if (selectedOption === 'category') {
            document.getElementById('categoryFilter').style.display = '';
            filterByCategory(document.getElementById('categoryFilter').value);
        } else if (selectedOption === 'name') {
            document.getElementById('nameFilter').style.display = '';
            filterByName(document.getElementById('nameFilter').value);
        }
    </script>

@endsection
