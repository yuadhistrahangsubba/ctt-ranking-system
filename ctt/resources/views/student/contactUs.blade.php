<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/student.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

        <title>Contact Us</title>
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
                            <a href="{{ route('creteria') }}" class="nav-item nav-link">Criteria</a>
                            <a href="{{ route('contactUs') }}" class="nav-item nav-link active text-secondary">Contact</a>
                            <a href="#" class="nav-item nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </div>
                    </form>
                </nav>
            </div>
        </div>

        <div class="container text-center py-5">
            <h1 class="display-2 mb-4 animated slideInDown" style="color:#E48310;">Contact Us</h1>
        </div>

        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="contact-detail position-relative p-5">
                    <div class="row g-5 mb-5 justify-content-center">
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square rounded-circle" style="width: 64px; height: 64px; background-color:#1D8348">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Address</h4>
                                    <a href="https://www.google.com/maps/place/Gyalpozhing+College+of+Information+Technology+-+Kabjisa+Campus/@27.535953,89.666797,12z/data=!4m6!3m5!1s0x39e19566fa54c4df:0x82f8fd359c78d7f5!8m2!3d27.5359525!4d89.6667967!16s%2Fg%2F11v61708_r?hl=en&entry=ttu" target="_blank" class="h5">Gyalpozhing College of Information Technology, Kabjisa Campus</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square rounded-circle" style="width: 64px; height: 64px;background-color:#1D8348">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Call Us</h4>
                                    <a class="h5" href="tel:+0123456789" target="_blank">+975 17821345</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                            <div class="d-flex bg-light p-3 rounded">
                                <div class="flex-shrink-0 btn-square rounded-circle" style="width: 64px; height: 64px; background-color:#1D8348">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Email Us</h4>
                                    <a class="h5" href="mailto:admin@example.com" target="_blank">admin5209@example.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                            <div class="p-5 h-100 rounded contact-map">
                                <iframe class="rounded w-100 h-100"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d67322.47532135702!2d89.65668105632255!3d27.525190281104628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e19566fa54c4df%3A0x82f8fd359c78d7f5!2sGyalpozhing%20College%20of%20Information%20Technology%20-%20Kabjisa%20Campus!5e0!3m2!1sen!2sbt!4v1696699920026!5m2!1sen!2sbt"
                                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif @if(Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif

                                    <form class="p-5 rounded contact-form" method="POST" action="{{ route('studentFeedback') }}">
                                        @csrf
                                        <div class="mb-4">
                                            <h1 style="color: #ffffff; font-size:24px;">Feedback</h1>
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" id="name" name="name" class="form-control border-0 py-3" placeholder="Your Name" required>
                                        </div>
                                        <div class="mb-4">
                                            <textarea id="message" name="message" class="w-100 form-control border-0 py-3" rows="6" cols="10" placeholder="Message" required></textarea>
                                        </div>
                                        <div class="text-start">
                                            <button class="btn text-white py-1 px-3" style="background-color: #E48310;" type="submit">Send Message</button>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('student.footer')
    </body>
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navLink = document.querySelector(".nav__link");

        hamburger.addEventListener("click", () => {
            navLink.classList.toggle("hide");
        });

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</html>
