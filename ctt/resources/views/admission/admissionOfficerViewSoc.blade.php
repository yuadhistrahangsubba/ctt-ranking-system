{{-- <!DOCTYPE html>
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
            <a href="{{ url('/admission/dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo"  class="logo " >
            </a>
        </div>

        <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admission/dashboard') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
            </a>
        </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admission/admissionOfficerSocLayout') }}">
                <i class="bx bx-trophy"></i>
                <span>Ranking</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('/admission/admissionOfficerStudentLayout') }}">
                <i class="bx bx-trophy"></i>
                <span>Students</span>
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pagetitle d-flex justify-content-between align-items-center">
                        <h1>Show Individual Student</h1>
                        <a class="nav-link collapsed d-inline-block" href="{{ url('admission/admissionOfficerSocLayout') }}">
                            <button type="button" class="btn btn-lg btn-dark" style="font-size: 18px; padding: 10px 20px;">
                                <i class="material-icons align-middle">&#xE5C4;</i>
                                <span class="align-middle">Back</span>
                            </button>
                        </a>
                    </div>
                    <section class="section dashboard mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                @if($student)
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Student Details</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>Name</th>
                                                        <td>{{ $student->NAME }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>INDEX_NO</th>
                                                        <td>{{ str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>CID Number</th>
                                                        <td>{{ $student->CID }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>DOB</th>
                                                        <td>{{ $student->DOB }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SCHOOL</th>
                                                        <td>{{ $student->SCHOOL }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SUB1</th>
                                                        <td>{{ $student->SUB1 }} - Marks: {{ $student->MKS1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SUB2</th>
                                                        <td>{{ $student->SUB2 }} - Marks: {{ $student->MKS2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SUB3</th>
                                                        <td>{{ $student->SUB3 }} - Marks: {{ $student->MKS3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SUB4</th>
                                                        <td>{{ $student->SUB4 }} - Marks: {{ $student->MKS4 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SUB5</th>
                                                        <td>{{ $student->SUB5 }} - Marks: {{ $student->MKS5 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>SUB6</th>
                                                        <td>{{ $student->SUB6 }} - Marks: {{ $student->MKS6 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Year</th>
                                                        <td>{{ $student->year }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>{{ $student->TOTAL }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <p class="mt-4">No student found with the specified INDEX_NO.</p>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
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
 --}}



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
     {{-- <form class="search-form d-flex align-items-center" method="POST" action="#">
         <input type="text" name="query" placeholder="Search" title="Enter search keyword">
         <button type="submit" title="Search"><i class="bi bi-search"></i></button>
     </form> --}}
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
             <a href="{{ url('/admission/dashboard') }}" class="logo d-flex align-items-center">
                 <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo"  class="logo " >
             </a>
         </div>

         <ul class="sidebar-nav" id="sidebar-nav">
                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('/admission/dashboard') }}">
                     <i class="bi bi-grid"></i>
                     <span>Dashboard</span>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="{{ url('/admission/admissionOfficerSocLayout') }}">
                     <i class="bx bx-trophy"></i>
                     <span>Ranking</span>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link collapsed" href="{{ url('/admission/admissionOfficerStudentLayout') }}">
                     <i class="bi bi-person"></i>
                     <span>Students</span>
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
         {{-- <div class="col-md-12">
             <div class="pagetitle d-flex justify-content-between align-items-center">
                 <h1>Show individual student</h1>
                 <a class="nav-link collapsed d-inline-block" href="{{ route('admissionOfficerStudentLayout') }}">
                   <button type="button" class="btn btn-lg btn-dark" style="font-size: 18px; padding: 10px 20px;">
                     <i class="material-icons align-middle">&#xE5C4;</i>
                       <span class="align-middle">Back</span>
                   </button>
               </a>
             </div>

         <section class="section dashboard">
             <div class="home-content">
                 <div class="row">
                     <div class="col-md-4">
                         @if($student)
                         <div class="card">
                             <div class="card-body">
                                 <h5 class="card-title">Name: {{ $student->name }}</h5>
                                 <p class="card-text">INDEX_NO: {{ str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT) }}</p>
                                 <p class="card-text">CID Number: {{ $student->CID }}</p>
                                 <p class="card-text">DOB: {{ $student->DOB }}</p>
                                 <p class="card-text">SCHOOL: {{ $student->SCHOOL }}</p>
                                 <p class="card-text">SUB1: {{ $student->SUB1 }}</p>
                                 <p class="card-text">Marks: {{ $student->MKS1 }}</p>
                                 <p class="card-text">SUB2: {{ $student->SUB2 }}</p>
                                 <p class="card-text">Marks: {{ $student->MKS2 }}</p>
                                 <p class="card-text">SUB3: {{ $student->SUB3 }}</p>
                                 <p class="card-text">Marks: {{ $student->MKS3 }}</p>
                                 <p class="card-text">SUB4: {{ $student->SUB4 }}</p>
                                 <p class="card-text">Marks: {{ $student->MKS4 }}</p>
                                 <p class="card-text">SUB5: {{ $student->SUB5 }}</p>
                                 <p class="card-text">Marks: {{ $student->MKS5 }}</p>
                                 <p class="card-text">SUB6: {{ $student->SUB6 }}</p>
                                 <p class="card-text">Marks: {{ $student->MKS6 }}</p>
                                 <p class="card-text">Year: {{ $student->year }}</p>
                                 <p class="card-text">TOTAL: {{ $student->TOTAL }}</p>
                             </div>
                         </div>
                         @else
                         <p>No student found with the specified INDEX_NO.</p>
                     @endif
                     </div>
                 </div>
             </div>
         </section> --}}

         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="pagetitle d-flex justify-content-between align-items-center">
                         <h1>Show individual student</h1>
                         <a class="nav-link collapsed d-inline-block" href="{{ route('admissionOfficerSocLayout') }}">
                           <button type="button" class="btn btn-lg btn-dark" style="font-size: 18px; padding: 10px 20px;">
                             <i class="material-icons align-middle">&#xE5C4;</i>
                               <span class="align-middle">Back</span>
                           </button>
                       </a>
                     </div>
                     <section class="section dashboard mt-4">
                         <div class="row">
                             <div class="col-md-12">
                                 @if($student)
                                 <div class="card">
                                     <div class="card-body">
                                         <h4 class="card-title mb-4">Student Details</h4>
                                         <div class="table-responsive">
                                             <table class="table table-bordered">
                                                 <tbody>
                                                     <tr>
                                                         <th>Name</th>
                                                         <td>{{ $student->NAME }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>INDEX_NO</th>
                                                         <td>{{ str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT) }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>CID Number</th>
                                                         <td>{{ $student->CID }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>DOB</th>
                                                         <td>{{ $student->DOB }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SCHOOL</th>
                                                         <td>{{ $student->SCHOOL }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SUB1</th>
                                                         <td>{{ $student->SUB1 }} - Marks: {{ $student->MKS1 }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SUB2</th>
                                                         <td>{{ $student->SUB2 }} - Marks: {{ $student->MKS2 }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SUB3</th>
                                                         <td>{{ $student->SUB3 }} - Marks: {{ $student->MKS3 }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SUB4</th>
                                                         <td>{{ $student->SUB4 }} - Marks: {{ $student->MKS4 }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SUB5</th>
                                                         <td>{{ $student->SUB5 }} - Marks: {{ $student->MKS5 }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>SUB6</th>
                                                         <td>{{ $student->SUB6 }} - Marks: {{ $student->MKS6 }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>Year</th>
                                                         <td>{{ $student->year }}</td>
                                                     </tr>
                                                     <tr>
                                                         <th>Total</th>
                                                         <td>{{ $student->TOTAL }}</td>
                                                     </tr>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                                 @else
                                 <p class="mt-4">No student found with the specified INDEX_NO.</p>
                                 @endif
                             </div>
                         </div>
                     </section>
                 </div>
             </div>
         </div>
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


