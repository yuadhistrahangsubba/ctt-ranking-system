<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/student.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

        <title>creteria</title>
        <style>
            .card {
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
                background-color: #f1f1f1;
                padding: 25px;
            }
        </style>

    </head>
    <body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">
        <div class="container-fluid" style="background-color: #1D8348;">
            <div class="row" style="margin-left: 5%; margin-right: 5%;">
                <nav class="navbar navbar-dark navbar-expand-lg py-0">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="text-white fw-bold d-block">CTT<span style="color: #ff7f18;">Ranking System</span> </h1>
                    </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form method="POST" action="{{ route('logout') }}" class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                        @csrf
                        <div class="navbar-nav ms-auto me-0 mt-0" style="color: #ffffff;">
                            <a href="{{ route('studentDashboard') }}" class="nav-item nav-link">Home</a>
                            <a href="{{ route('creteria') }}" class="nav-item nav-link active text-secondary">Criteria</a>
                            <a href="{{ route('contactUs') }}" class="nav-item nav-link">Contact</a>
                            <a href="#" class="nav-item nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </div>
                    </form>
                </nav>
            </div>
        </div>

            <div class="container text-center py-5">
                <h1 class="display-2 mb-4 animated slideInDown" style="color:#E48310;">Creteria</h1>
            </div>

            <div class="container px-2 py-5 px-md-2 text-center text-lg-start my-5">
                <div class="row gx-lg-5 align-items-center mb-5" >
                    <div class="col-lg-6 col-md-6 mb-5 mb-lg-0" style="z-index: 10">
                        <div class="card">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20230911173805/What-is-Artiificial-Intelligence(AI).webp" class="img-fluid" style="padding: 0; height:400px;max-width:600px" alt="Image not found">
                            <h3 style="text-align: center;margin:20px">Admission criteria for Computer Science</h3>
                            <p style="text-align: center;margin:10px">1. Class 12 Science passed students with a minimum of 50% in Mathematics</p>
                            <p style="text-align: center;margin:10px">2. Ability Rating <br>
                                Mathematics - x5 <br>
                                English - x2 <br>
                                3 other subjects - x1
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-5 mb-lg-0" style="z-index: 10">
                        <div class="card">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgoMMqknO90jEiq6nc5rau_ooYAftKje2HYNRYRMzcydK9cqFaQgZj92BoPmS6Y2nAZFJrX5MvtM1wMSAniE4hlB9q7y9zPVMRhf6Ka19UDt5Awq6or-tTxXhEUJFwUjoE3fKrBf6zlFULwr2pAV7AxDql3if5sGTNPxzXSut0bI2Ty3Rrbrxv-dQhb/s490/myhc_89683.jpg" class="img-fluid" style="padding: 0;height:400px; max-width:600px" alt="Image not found">
                            <h3 style="text-align: center;margin:20px">Admission criteria for Computer Science</h3>
                            <p style="text-align: center;margin:10px">1. Class 12 Science passed students with a minimum of 50% in Mathematics</p>
                            <p style="text-align: center;margin:10px">2. Ability Rating <br>
                                Mathematics - x5 <br>
                                English - x2 <br>
                                3 other subjects - x1
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @include('student.footer')
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</html>
