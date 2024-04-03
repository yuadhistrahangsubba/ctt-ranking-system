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

    <main class="main">
        <section class="section dashboard">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8" style="top: 80px">
                        <div class="pagetitle d-flex justify-content-between align-items-center" >
                            <h1>Edit Student</h1>
                            <a class="nav-link collapsed" href="{{ url('/admission/admissionOfficerSocLayout') }}">
                                <button type="button" class="btn btn-lg btn-dark" style="font-size: 18px; padding: 10px 20px;" data-toggle="modal" name="uploadbutton">
                                    <i class="material-icons align-middle">&#xE5C4;</i> Back
                                </button>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                @if(session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('updateSoc', ['INDEX_NO' => str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT)]) }}" style="margin-top: 20px;" accept-charset="UTF-8">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group">
                                        <label for="NAME">Name</label>
                                        <input type="text" name="NAME" id="NAME" value="{{ $student->NAME }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="INDEX_NO">Student Index Number</label>
                                        <input type="text" name="INDEX_NO" id="INDEX_NO" value="{{ str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT) }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="CID">CID</label>
                                        <input type="text" name="CID" id="CID" value="{{ $student->CID }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="DOB">Date of Birth</label>
                                        <input type="date" name="DOB" id="DOB" value="{{ $student->DOB }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="SCHOOL">School</label>
                                        <input type="text" name="SCHOOL" id="SCHOOL" value="{{ $student->SCHOOL }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <!-- Subject 1 -->
                                    <div class="form-group">
                                        <label for="SUB1">Subject 1</label>
                                        <input type="text" name="SUB1" id="SUB1" value="{{ $student->SUB1 }}" class="form-control" required style="font-size:14px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="MKS1">Marks 1</label>
                                        <input type="text" name="MKS1" id="MKS1" value="{{ $student->MKS1 }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <!-- Subject 2 -->
                                    <div class="form-group">
                                        <label for="SUB2">Subject 2</label>
                                        <input type="text" name="SUB2" id="SUB2" value="{{ $student->SUB2 }}" class="form-control" required style="font-size:14px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="MKS2">Marks 2</label>
                                        <input type="text" name="MKS2" id="MKS2" value="{{ $student->MKS2 }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <!-- Subject 3 -->
                                    <div class="form-group">
                                        <label for="SUB3">Subject 3</label>
                                        <input type="text" name="SUB3" id="SUB3" value="{{ $student->SUB3 }}" class="form-control" required style="font-size:14px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="MKS3">Marks 3</label>
                                        <input type="text" name="MKS3" id="MKS3" value="{{ $student->MKS3 }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <!-- Subject 4 -->
                                    <div class="form-group">
                                        <label for="SUB4">Subject 4</label>
                                        <input type="text" name="SUB4" id="SUB4" value="{{ $student->SUB4 }}" class="form-control" required style="font-size:14px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="MKS4">Marks 4</label>
                                        <input type="text" name="MKS4" id="MKS4" value="{{ $student->MKS4 }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <!-- Subject 5 -->
                                    <div class="form-group">
                                        <label for="SUB5">Subject 5</label>
                                        <input type="text" name="SUB5" id="SUB5" value="{{ $student->SUB5 }}" class="form-control" required style="font-size:14px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="MKS5">Marks 5</label>
                                        <input type="text" name="MKS5" id="MKS5" value="{{ $student->MKS5 }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <!-- Subject 6 -->
                                    <div class="form-group">
                                        <label for="SUB6">Subject 6</label>
                                        <input type="text" name="SUB6" id="SUB6" value="{{ $student->SUB6 }}" class="form-control" required style="font-size:14px;">
                                    </div>
                                    <div class="form-group">
                                        <label for="MKS6">Marks 6</label>
                                        <input type="text" name="MKS6" id="MKS6" value="{{ $student->MKS6 }}" class="form-control" required style="font-size:14px;">
                                    </div>

                                    <div class="form-group">
                                        <label for="TOTAL">TOTAL</label>
                                        <input type="text" name="TOTAL" id="TOTAL" value="{{ $student->total }}" style="font-size:14px;" class="form-control" readonly>
                                        {{-- <input type="text" name="TOTAL" id="TOTAL" value="{{ $student->TOTAL }}" class="form-control" readonly style="font-size:14px;"> --}}
                                    </div>

                                    <button type="submit" style="background-color: #23242A;color:white; font-size:16px; border-radius:4px;">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateTotal() {
            var sub1 = "{{ $student->SUB1 }}";
            var mks1 = parseInt("{{ $student->MKS1 }}") || 0;
            var sub2 = "{{ $student->SUB2 }}";
            var mks2 = parseInt("{{ $student->MKS2 }}") || 0;
            var sub3 = "{{ $student->SUB3 }}";
            var mks3 = parseInt("{{ $student->MKS3 }}")|| 0;
            var sub4 = "{{ $student->SUB4 }}";
            var mks4 = parseInt("{{ $student->MKS4 }}")|| 0;
            var sub5 = "{{ $student->SUB5 }}";
            var mks5 = parseInt("{{ $student->MKS5 }}")|| 0;
            var sub6 = "{{ $student->SUB6 }}";
            var mks6 = parseInt("{{ $student->MKS6 }}")|| 0;

            var total = 0;

            if (sub1 === 'ENG') {
                total += mks1 * 2;
            }

            if (sub2 === 'MAT' || sub2 === 'BMT') {
                total += mks2 * 5;
            }
            if (sub3 === 'MAT' || sub3 === 'BMT') {
                total += mks3 * 5;
            }
            if (sub4 === 'MAT' || sub4 === 'BMT') {
                total += mks4 * 5;
            }
            if (sub5 === 'MAT' || sub5 === 'BMT') {
                total += mks5 * 5;
            }
            if (sub6 === 'MAT' || sub6 === 'BMT') {
                total += mks6 * 5;
            }

            var subjectMarks = [
            { subject: sub2, marks: mks2 },
            { subject: sub3, marks: mks3 },
            { subject: sub4, marks: mks4 },
            { subject: sub5, marks: mks5 },
            { subject: sub6, marks: mks6 }
            ];

            var validSubjects = subjectMarks.filter(item => item.subject !== 'MAT' && item.subject !== 'BMT');
            validSubjects.sort((a, b) => b.marks - a.marks);
            var sumOfThreeHighest = validSubjects.slice(0, 3).reduce((sum, subject) => sum + subject.marks, 0);
            total += sumOfThreeHighest;

            $("#TOTAL").val(total);
        }

        $(document).ready(function() {
            updateTotal();
        });
    </script>

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

