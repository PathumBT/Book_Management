<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK MANAGEMENT @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('dashboard_theme/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard_theme/assets/vendors/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_theme/assets/vendors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_theme/assets/vendors/summernote/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_theme/assets/vendors/simple-datatables/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('dashboard_theme/assets/assets/vendors/apexcharts/apexcharts.css') }}"> -->
    <link rel="stylesheet" href=" {{ asset('dashboard_theme/assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_theme/assets/vendors/toastify/toastify.css') }}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <link href="{{ asset('dashboard_theme/assets/css/miniAlbum.css') }}" rel="stylesheet">

    <link rel="stylesheet"
        href=" {{ asset('dashboard_theme/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href=" {{ asset('dashboard_theme/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href=" {{ asset('dashboard_theme/assets/css/app.css') }}">
    <link rel="stylesheet" href=" {{ asset('common/css/saqmple.css') }}">
    <link rel="stylesheet" href=" {{ asset('dashboard_theme/assets/css/calendar.css') }}">

    <!-- <link rel="shortcut icon" href=" {{ asset('dashboard_theme/assets/images/favicon.svg') }}" type="image/x-icon"> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <!-- font awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"></script>

    <!-- calendar -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- simple-datatable -->
    <link rel="stylesheet" href=" {{ asset('dashboard_theme/assets/js/simple-datatables/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        .styled-logout {
            display: flex;
            align-items: center;
            padding: 10px;
            color: #ffffff;
            background-color: #24a57f;
            text-decoration: none;
            border-radius: 40px;
            transition: background-color 0.3s ease;
        }

        .styled-logout:hover {
            background-color: #0056b3;
            text-decoration: none;
        }

        .bi-box-arrow-right {
            margin-right: 5px;
        }
    </style>
    <script src="">
        #toast - container > .customer - info {
            background - color: dodgerblue!important;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <div class="">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active" style="overflow-y: unset; z-index: 90">
                <div class="sidebar-header py-0 px-0">
                    <div class="d-flex justify-content-center align-items-center px-1 bg-primary-purple w-100 h-80">
                        <div class="text-center w-100">
                            <img src="{{ asset('dashboard_theme/assets/images/smg8.jpg') }}"
                                style="width: 65px; height: auto;">
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-right"></i></a>
                        </div>

                    </div>
                </div>
                <div class='mt-4 mb-2'>
                    <h6 class="h6 my-3 ms-3 text-20 bold-350">Book Management System</h6>

                    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

                    <div class="sidebar-menu">
                        <ul class="menu mt-0 px-0">
                            <li class="sidebar-item">
                                <div class="card-body p-0">
                                    <div class="badges">

                            <li class="sidebar-item">

                                <div class="accordion accordion-flush mt-2" id="accordionExample">

                                    <div class="accordion-item">

                                    </div>
                                </div>
                    </div>

                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button bold-600 collapsed text-gray text-16" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                            aria-controls="collapseFive">
                            Book Management
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse bold-500 text-gray"
                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="{{ route('book_manage') }}"
                                class="d-flex align-items-center ps-3 py-1 my-1 height-50 bold-500 text-gray text-14 active atag">
                                <i class="bi bi-card-text me-2"></i>
                                <p class="m-0 p-0">Book Manager</p>
                            </a>
                            <a href="{{ route('book_exchange') }}"
                                class="d-flex align-items-center ps-3 py-1 my-1 height-50 bold-500 text-gray text-14 active atag">
                                <i class="bi bi-card-text me-2"></i>
                                <p class="m-0 p-0">Book Borrow</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button bold-600 collapsed text-gray text-16" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                            aria-controls="collapseSix">
                            User Management
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse bold-500 text-gray"
                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="border-start" id="items">

                                @if (Auth::user()->role == '1')
                                    <a href="{{ route('user_list') }}"
                                        class="d-flex align-items-center ps-3 py-1 my-1 active-div height-50 bold-500 text-gray text-14 atag">
                                        <i class="bi bi-file-earmark me-2"></i>
                                        <p class="m-0 p-0">User Management</p>
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <li class="sidebar-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="sidebar-link styled-logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    @endif
                </li>

            </div>
        </div>
    </div>
    <div>
        <div class="bg-white" id="main">
            <div class="m-0 p-0 bg-color">
                @yield('content')
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('dashboard_theme/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard_theme/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dashboard_theme/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('dashboard_theme/assets/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('dashboard_theme/assets/js/pages/form-editor.js') }}"></script>

    <script src="{{ asset('dashboard_theme/assets/vendors/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
    </script>

    <script src="{{ asset('dashboard_theme/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />

    <script src="{{ asset('dashboard_theme/assets/vendors/fontawesome/all.min.js') }}"></script>

    <script src="assets/js/main.js"></script>
    <script src="{{ asset('dashboard_theme/assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

</body>
