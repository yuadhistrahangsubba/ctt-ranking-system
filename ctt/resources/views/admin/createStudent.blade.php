<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="UTF-8">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>CTT Ranking System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('assets/img/logo.jpg') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
    <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="search-bar">
    </div>

    <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
        </a>
        </li>
    </ul>
    </nav>
    </header>

    <aside id="sidebar" class="sidebar">
        <div class="d-flex mb-5 align-items-center justify-content-between">
            <a href="{{ url('/admin/dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo"  class="logo " >
            </a>
        </div>

        <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/upload') }}">
              <i class="bx bx-upload"></i>
              <span>Upload</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/viewAll') }}">
            <i class="bi bi-eye"></i>
              <span>View Students</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/socLayout') }}">
            <i class="bx bx-trophy"></i>
            <span>Ranking</span>
            </a>
        </li>

          <li class="nav-item">
            <a class=" nav-link collapsed" href="{{ url('/admin/aoLayout') }}">
              <i class="bx bx-user-pin"></i>
              <span>Admission Officer</span>
            </a>
          </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/studentLayout') }}">
            <i class="bi bi-person"></i>
            <span>Students</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/requestLayout') }}">
                <i class="bi bi-chat-dots"></i>
                <span>Request</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/creteriaLayout') }}">
                <i class="bi bi-plus"></i>
                <span>Criteria</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admin/dateLayout') }}">
                <i class="bi bi-calendar"></i>
                <span>Apply Date</span>
            </a>
        </li>

        <hr class="custom-line">

        <li class="log_out">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#"  class="nav-link collapsed" onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
            </form>
        </li>
        </ul>

        </aside>

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8" style="top: 80px">
                        <div class="pagetitle d-flex justify-content-between align-items-center" >
                            <h1>Add New Student</h1>
                            <a class="nav-link collapsed d-inline-block" href="{{ route('studentLayout') }}">
                                <button type="button" class="btn btn-lg btn-dark" style="font-size: 18px; padding: 10px 20px;">
                                    <i class="material-icons align-middle">&#xE5C4;</i>
                                    <span class="align-middle">Back</span>
                                </button>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ url('/admin/createStudent') }}" method="post" style="margin-top: 20px">
                                    {!! csrf_field() !!}
                                    <label>INDEX_NO</label></br>
                                    <input type="text" name="INDEX_NO" id="INDEX_NO" class="form-control" style="font-size: 16px"></br>
                                    <label>CID</label></br>
                                    <input type="text" name="CID" id="CID" class="form-control" style="font-size: 16px"></br>
                                    <label>NAME</label></br>
                                    <input type="text" name="NAME" id="NAME" class="form-control" style="font-size: 16px"></br>
                                    <label>DOB</label></br>
                                    <input type="date" name="DOB" id="DOB" class="form-control" style="font-size: 16px"></br>
                                    <label>School</label></br>
                                    <input type="text" name="SCHOOL" id="SCHOOL" class="form-control"style="font-size: 16px"></br>
                                    <label>Year</label></br>
                                    <input type="number" name="year" id="year" class="form-control" style="font-size: 16px"></br>
                                    <label>English Marks</label></br>
                                    <input type="number" name="eng" id="eng" class="form-control" style="font-size: 16px"></br>
                                    <label>Math Marks</label></br>
                                    <input type="number" name="math" id="math" class="form-control" style="font-size: 16px"></br>
                                    <label>Dzongkha Marks</label></br>
                                    <input type="number" name="dzo" id="dzo" class="form-control"style="font-size: 16px"></br>

                                    <label>SUB4 Marks</label></br>
                                    <div class="input-group" style="margin-bottom:10px;">
                                        <select name="sub4_name" id="sub4_name" class="form-select" style="font-size: 16px" required>
                                            <option value="" selected disabled>Select your subjects</option>
                                                <option>PHY</option>
                                                <option>ECO</option>
                                                <option>HIS</option>
                                        </select>
                                    </div>
                                    <input type="number" name="sub4" id="sub4" class="form-control" style="font-size: 16px"></br>

                                    <label>SUB5 Marks</label></br>
                                    <div class="input-group" style="margin-bottom:10px;">
                                        <select name="sub5_name" id="sub5_name" class="form-select" style="font-size: 16px" required>
                                            <option value="" selected disabled>Select your subjects</option>
                                            <option>CHEM</option>
                                            <option>ACC</option>
                                            <option>GEO</option>
                                        </select>
                                    </div>
                                    <input type="number" name="sub5" id="sub5" class="form-control" style="font-size: 16px"></br>

                                    <label>SUB6 Marks</label></br>
                                    <div class="input-group" style="margin-bottom:10px;">
                                        <select name="sub6_name" id="sub6_name" class="form-select" style="font-size: 16px" required >
                                            <option value="" selected disabled>Select your subjects</option>
                                            <option>BIO</option>
                                            <option>MEDIA</option>
                                            <option>RIGE</option>
                                        </select>
                                    </div>
                                    <input type="number" name="sub6" id="sub6" class="form-control" style="font-size: 16px;">

                                    <button type="submit" style="background-color: #23242A;color:white; font-size:16px; border-radius:4px; margin-top:20px;">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
