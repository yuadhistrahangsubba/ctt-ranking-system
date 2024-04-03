<?php
$admissionOfficersCount = App\Models\User::where('role', 'ao')->count();
$otherUsersCount = App\Models\User::where('role', 'admin')->count();

$totalSocRankingStudents = App\Models\Student::where('SOC', 1)->count();
$totalSiddRankingStudents = App\Models\Student::where('SIDD', 1)->count();
$totalBothRankingStudents = App\Models\Student::where('SOC', 1)->where('SIDD', 1)->count();

$chartData = [
    'labels' => ['SOC', 'SIDD', 'Both'],
    'data' => [
        $totalSocRankingStudents,
        $totalSiddRankingStudents,
        $totalBothRankingStudents
    ]
];

$chartDataJSON = json_encode($chartData);
?>

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
                    <a class="nav-link" href="{{ url('/admission/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ url('/admission/admissionOfficerSocLayout') }}">
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
        <div class="pagetitle d-flex justify-content-between align-items-center ml-4">
            <h1>Dashboard</h1>
        </div>
        <section class="section dashboard">
            <div class="home-content">
                <div class="overview-boxes">
                </div>
                <div class="sales-boxes">
                  <div class="recent-sales box">
                      <div class="title">System Statics</div>
                      <p style="font-size: 16px;">Total students: <span style="font-weight: bold;"><?php echo App\Models\Student::count(); ?></span></p>
                      <p style="font-size: 16px;">Total apply students: <span style="font-weight: bold;"><?php echo App\Models\Student::count(); ?></span></p>
                      <p style="font-size: 16px;">Total Soc Ranking students: <span style="font-weight: bold;"><?php echo App\Models\Student::where('SOC', '1')->count(); ?></span></p>
                      <p style="font-size: 16px;">Total Sidd Ranking students: <span style="font-weight: bold;"><?php echo App\Models\Student::where('SIDD', '1')->count(); ?></span></p>
                      <p style="font-size: 16px;">Total Both Ranking students: <span style="font-weight: bold;"><?php echo App\Models\Student::where('SOC', '1')->where('SIDD', '1')->count(); ?></span></p>

                      <canvas id="studentChart" width="400" height="200"></canvas>
                  </div>

                  <div class="top-sales box">
                    <div class="title">Total Admission Officers.</div>
                      <p style="font-size: 16px;">Total: <span style="font-weight: bold;"><?php echo \DB::table('users')->where('role', 'ao')->count(); ?></span></p>

                      <canvas id="admissionOfficersChart" width="400" height="400"></canvas>
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

    {{-- Bar graph --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = <?php echo $chartDataJSON; ?>;

        const ctx = document.getElementById('studentChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Number of Students',
                    data: chartData.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
    const admissionOfficersCount = <?php echo $admissionOfficersCount; ?>;
    const otherUsersCount = <?php echo $otherUsersCount; ?>;

    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('admissionOfficersChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Admission Officers', 'Admin'],
                datasets: [{
                    data: [admissionOfficersCount, otherUsersCount],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                // Add any chart options or configurations here
            }
        });
    });
</script>

</body>
</html>

