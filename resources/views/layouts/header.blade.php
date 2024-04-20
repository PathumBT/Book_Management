<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-Management-System</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/summernote/summernote-lite.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/toastify/toastify.css')}}">
    <link rel="stylesheet" href="{{asset('common/css/common.css')}}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/css/app.css')}}">
    <link rel="shortcut icon" href=" {{asset('assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a style="font-size: 18px !important;" href=""> <span> Book Management System </span> </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <main class="">
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class="sidebar-item">
                                <div class="card-body">
                                    <div class="badges">

                                        <span>Name: {{Auth::user()->name}} <span class="fw-bolder"></span></span>
                                        <hr>
                                        <span>Role:</span>
                                        <span class="badge bg-success">Admin</span>

                                    </div>
                                </div>
                            </li>
                     
                            <li class="sidebar-item   @if(\Request::is('/'))) active @endif ">
                                <a href="/" class='sidebar-link'>
                                    <i class="bi bi-house"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item   @if(\Request::is('user_list'))) active @endif ">
                                <a href="{{ route('user_list') }}" class='sidebar-link'>
                                    <i class="bi bi-house"></i>
                                    <span>User Management</span>
                                </a>
                            </li>

                            <li
                                class="sidebar-item  has-sub  @if(\Request::is('book_manage'))) active @endif  @if(\Request::is('book_exchange'))) active @endif  @if(\Request::is('editBook*'))) active @endif @if(\Request::is('book_issued*'))) active @endif">
                                <a href="#" class='sidebar-link '>
                                    <i class="bi bi-people"></i>
                                    <span>Book Management</span>
                                </a>
                                <ul
                                    class="submenu @if(\Request::is('book_manage'))) active @endif  @if(\Request::is('book_exchange'))) active @endif @if(\Request::is('editBook*'))) active @endif @if(\Request::is('book_issued*'))) active @endif ">
                                    <li class="submenu-item @if(\Request::is('book_manage'))) active @endif ">

                                        <a href="{{ route('book_manage') }}"> <i class="bi"></i>Book Manage</a>
                                    </li>
                                    <li class="submenu-item @if(\Request::is('book_issued'))) active @endif ">
                                      <a href="{{ route('book_issued') }}"> <i class="bi"></i>Book Issue</a>
                                    </li>
                                    <li class="submenu-item @if(\Request::is('book_exchange'))) active @endif ">

                                        <a href="{{ route('book_exchange') }}"> <i class="bi"></i>Book Borrow</a>
                                    </li>
                                    @if(\Request::is('editBook*'))
                                    <li class="submenu-item @if(\Request::is('editBook*'))) active @endif ">
                                    <a href="#"> <i class="bi"></i>Book Modify </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                                           
                            <li class="sidebar-item">
                                @if (Route::has('login'))
                                    @auth
                                        <a button type="button" class="sidebar-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Log Out</span></button></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form></a>
                                    @else
                                @endauth
                                @endif
                            </li>
                        </ul>
                    </div>               
            </div>
        </div>


        @yield('content')
        </main>


        <footer>

    </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-editor.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendors/summernote/summernote-lite.min.js')}}"></script>
    <script> @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");</script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })


    </script>

    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
