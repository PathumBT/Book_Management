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
                    <h3>Book Modify</h3>
                    <p class="text-subtitle text-muted">Input Book Imformation.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Modify</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <section class="section">
            <div class="">
                <h4 class="card-title">Book Modify Form</h4>
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
                    <form class="form form-horizontal"  role="form" method="POST" action="{{ url('update_book/' . $book->id) }}">
                        <div class="form-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Book Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" value="{{ $book->title }}" class="form-control" name="title" placeholder="Book Name">
                                </div>
                                <div class="col-md-4">
                                    <label>Book Author</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" value="{{ $book->author }}" class="form-control" name="author" placeholder="Book Author ">
                                </div>
                                <div class="col-md-4">
                                    <label>Price</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" value="{{ $book->price }}"  class="form-control" name="price" placeholder="Price">
                                </div>
                                <div class="col-md-4">
                                    <label>Stock</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="number" value="{{ $book->stock }}" class="form-control" name="stock" placeholder="Stock">
                                </div>
                                <div class="col-md-4">
                                    <label>Book Category</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select required name="category" class="form-control">
                                        @foreach ($categories as $category)
                                                @if($book->book_category_id == $category->id )
                                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection

