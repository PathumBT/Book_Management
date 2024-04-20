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
                    <h3>Book Issue</h3>
                    <p class="text-subtitle text-muted">Input Book Issue imformation.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Book Issue</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book Issue</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Book Issue</h4>
            </div>
            <div class="card-content">
                <div class="card-body">              
                    <div class="tab-content text-justify">
                        <section class="section">
                            <form id="myForm" role="form" method="POST">
                                        {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div id="auth-left">

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

                                            <br>

                                            <div class="form-group position-relative has-icon-left mb-4">
                                                <label for="first-name-icon">Select Name OR NIC</label>
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="SelectCategory">
                                                        <option selected disabled>Select Name OR NIC</option>
                                                        <option value="1">Name</option>
                                                        <option value="2">NIC</option>                                     
                                                    </select>
                                                </fieldset>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>

                                            <div class="form-group position-relative has-icon-left mb-4">
                                                <label for="first-name-icon">Book Name</label>
                                                <fieldset class="form-group">
                                                    <select name="book" id="select-book" placeholder="Select Book Name...">                               
                                                    <option value="" selected></option>
                                                        @foreach ($books as $key => $booksData)
                                                            <option value="{{$booksData->id}}">{{$booksData->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>                               
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <br>
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <label for="first-name-icon">Select</label>
                                            <fieldset class="form-group">
                                                <input readonly type="text" id="firstInputShow" class="form-control firstInput" name="nic" >
                                              
                                                 <dev style="display: none;" id="nameInputShow"  class="nameInput" > 
                                                    <select  id="nameInput" name="user"   placeholder="Select Customer Name...">                               
                                                        <option value="" selected></option>
                                                            @foreach ($customers as $key => $customerData)
                                                                <option value="{{$customerData->id}}">{{$customerData->name}}</option>
                                                            @endforeach
                                                    </select>
                                                 </dev>
                                                
                                                <dev style="display: none;"  id="nicInputShow" class="nicInput" > 
                                                    <select  name="nic"  id="nicInput"    placeholder="Select NIC Number...">                               
                                                        <option value="" selected></option>
                                                            @foreach ($customers as $key => $customerData)
                                                                <option value="{{$customerData->id}}">{{$customerData->nic}}</option>
                                                            @endforeach
                                                    </select>
                                                </dev>  
                                            </fieldset>

                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                               
                                </div>
                             </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>


<script>
    new TomSelect("#nameInput",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
</script>

<script>
    new TomSelect("#nicInput",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
</script>


<script>
    new TomSelect("#select-book",{
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            }
        });
</script>

<script>
    document.getElementById('SelectCategory').addEventListener('change', function() {
        var selectedValue = this.value;
        var nameInput = document.getElementById('nameInputShow');
        var nicInput = document.getElementById('nicInputShow');
        var firstInputs = document.getElementById('firstInputShow');

        firstInputs.style.display = 'none';

        if (selectedValue === '1') {
            nameInput.style.display = 'block';
            nicInput.style.display = 'none';
        } else if (selectedValue === '2') {
            nameInput.style.display = 'none';
            nicInput.style.display = 'block';
        } else {
            nameInput.style.display = 'none';
            nicInput.style.display = 'none';
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault();

            var formData = {
                _token: $('input[name="_token"]').val(),
                book_id: $('#select-book').val() !== "" ? $('#select-book').val() : null,
                user_id: $('#nameInput').val().trim() !== "" ? $('#nameInput').val().trim() : null,
                nic_id: $('#nicInput').val().trim() !== "" ? $('#nicInput').val().trim() : null
            };

            console.log(formData);
            $.ajax({
                url: '/api/issue-book/' + formData.user_id + '/' + formData.book_id + '/' + formData.nic_id,
                type: 'GET',
                data: formData,
                success: function(response) {

                    Swal.fire({
                    position: "tcenter",
                    icon: "success",
                    title: response.success,
                    showConfirmButton: false,
                    timer: 1500
                    });
                 
                },
                
                error: function(xhr, status, error) {
                    var errorMessage = JSON.parse(xhr.responseText).error || "Something went wrong!";
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: errorMessage,
                    footer: ''
                    });
                   
                }
            });
        });
    });
</script>


@endsection
