<?php
use App\Models\ApplyDate;

// $applyDateObject = ApplyDate::select('applyDate')->latest('applyDate')->first();
$applyDateObject = ApplyDate::select('applyDate')->latest()->first();

if ($applyDateObject) {
    $applyDate = $applyDateObject->applyDate;

    $applyDateJsFormat = date("Y-m-d", strtotime($applyDate));
} else {
    $applyDate = '2023-01-01';
    $applyDateJsFormat = date("Y-m-d", strtotime($applyDate));
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Student Dashboard</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <link href="{{ asset('newAssets/assets/img/favicon.png') }}" rel="icon" />
        <link href="{{ asset('newAssets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

        <link href="{{ asset('newAssets/assets/css/style.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('newAssets/assets/vendor/aos/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('newAssets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('newAssets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('newAssets/assets/vendor/boxicons/css/boxicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('newAssets/assets/vendor/glightbox/css/glightbox.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('newAssets/assets/vendor/swiper/swiper-bundle.min.css') }}" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">
                <img src="{{ asset('newAssets/assets/img/logoOriginal.jpg') }}" class="logo" alt="" />
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="#about">About</a></li>
                            <li><a class="nav-link scrollto" href="#services">Apply</a></li>
                            <li><a class="nav-link scrollto" href="#rank">Rank</a></li>
                            <li><a class="nav-link scrollto" href="#pricing">Criteria</a></li>
                            <li><a class="nav-link scrollto" href="#team">Team</a></li>
                            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                            <li><a class="nav-link scrollto" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>
                        </ul>
                        <i class="fas fa-bars mobile-nav-toggle"></i>
                    </nav>
                </form>
            </div>
        </header>

        <div class="modal fade" id="mobileNavModal" tabindex="-1" role="dialog" aria-labelledby="mobileNavModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mobileNavModalLabel"></h5>
                        <i type="button" class="bi mobile-nav-toggle bi-x" style="color: orange;" data-dismiss="modal" aria-label="Close"> {{-- <span aria-hidden="true">&times;</span> --}} </i>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <ul style="list-style: none; padding-left: 0;">
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto active" href="#hero">Home</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#about">About</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#services">Apply</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#rank">Rank</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#pricing">Criteria</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#team">Team</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#contact">Contact</a>
                                </li>
                                <li style="margin: 10px 0; padding: 8px 16px; color: black;">
                                    <a class="nav-link scrollto" href="#" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <section id="hero" class="d-flex align-items-center">
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
                <h1>Welcome to CTT RANKING</h1>
                <h2>12 graduate students can apply for CTT Ranking System.</h2>
                <a href="#services" class="btn-get-started scrollto">Get Started</a>
            </div>
        </section>

        <main id="main">
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
                            <img src="{{ asset('newAssets/assets/img/about.jpg') }}" class="img-fluid" alt="" />
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                            <h3>Computational Thinking Test (CTT) RANKING SYSTEM</h3>
                            <p class="fst-italic">
                                The aim of this project is to develop an automated admission ranking application for GCIT that calculates and displays rankings for 12 graduate students in Bhutan. The application will streamline the ranking
                                process, ensuring transparency, fairness, and efficiency in determining which students are offered admission.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Take student's data/ results as input.</li>
                                <li><i class="bi bi-check-circle"></i> Apply filtering to get science students with mathematical subjects.</li>
                                <li><i class="bi bi-check-circle"></i> Apply a ranking algorithm to calculate a comprehensive ranking score.</li>
                                <li><i class="bi bi-check-circle"></i> Display the rankings of the students in a clear and organized format.</li>
                                <li><i class="bi bi-check-circle"></i> Provide a platform for administrators to manage student's data easily.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section id="why-us" class="why-us">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6" data-aos="fade-up">
                            <div class="box">
                                <h4>Vision</h4>
                                <p>
                                    Our vision is to be a leading institution in software technology and interactive design that produces future ready graduates with commitment to academic excellence, innovation, and social responsibility.
                                    <br />
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6" data-aos="fade-up">
                            <div class="box">
                                <h4>Mission</h4>
                                <p>Our mission is to equip the tech generation with advanced skills in software technology and interactive design, preparing them to contribute and lead in the technology and design industry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="clients" class="clients">
                <div class="container" data-aos="zoom-in">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="https://www.rub.edu.bt/" target="_blank">
                                <img src="{{ asset('newAssets/assets/img/clients/cropped-RUB-removebg-preview.png') }}" class="img-fluid" alt="" />
                            </a>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="https://tech.gov.bt/" target="_blank">
                                <img src="{{ asset('newAssets/assets/img/clients/Tech-removebg-preview.png') }}" class="img-fluid" alt="" />
                            </a>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="http://www.education.gov.bt/" target="_blank">
                                <img src="{{ asset('newAssets/assets/img/clients/images-removebg-preview.png') }}" class="img-fluid" alt="" />
                            </a>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="https://www.moice.gov.bt/" target="_blank">
                                <img src="{{ asset('newAssets/assets/img/clients/download-removebg-preview.png') }}" class="img-fluid" alt="" />
                            </a>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="https://www.rcsc.gov.bt/en/" target="_blank">
                                <img src="{{ asset('newAssets/assets/img/clients/rcsc_logo-removebg-preview.png') }}" class="img-fluid" alt="" />
                            </a>
                        </div>

                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="https://www.citizenservices.gov.bt/g2cportal/ListOfLifeEventComponent" target="_blank">
                                <img src="{{ asset('newAssets/assets/img/clients/unnamed-removebg-preview (1).png') }}" class="img-fluid" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="services" class="services">
                <div class="container">
                    <div class="section-title">
                        <span>Apply</span>
                        <h2>Apply</h2>
                        <p>Welcome to Our Website. We are glad to have you around and Apply for our college.</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-12" data-aos="fade-up">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">CID</th>
                                        @php $student = \App\Models\Student::where('cid', auth()->user()->cid)->first(); @endphp @if($student)
                                        <th scope="col">{{ $student->SUB1 }}</th>
                                        <th scope="col">{{ $student->SUB2 }}</th>
                                        <th scope="col">{{ $student->SUB3 }}</th>
                                        <th scope="col">{{ $student->SUB4 }}</th>
                                        <th scope="col">{{ $student->SUB5 }}</th>
                                        <th scope="col">{{ $student->SUB6 }}</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">SOC</th>
                                        <th scope="col">SIDD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $student->NAME }}</td>
                                        <td>{{ $student->CID }}</td>
                                        <td>{{ $student->MKS1 }}</td>
                                        <td>{{ $student->MKS2 }}</td>
                                        <td>{{ $student->MKS3 }}</td>
                                        <td>{{ $student->MKS4 }}</td>
                                        <td>{{ $student->MKS5 }}</td>
                                        <td>{{ $student->MKS6 }}</td>
                                        <td>{{ $student->TOTAL }}</td>
                                        <td>{{ $student->SOC == 1 ? 'Applied' : 'Not Applied' }}</td>
                                        <td>{{ $student->SIDD == 1 ? 'Applied' : 'Not Applied' }}</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div id="errorDiv"></div>
                        </div>

                        <form method="POST" action="{{ route('studentDashboard') }}" onsubmit="return validateForm()">
                            @csrf @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                            @endif @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-6 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="450">
                                    <div class="icon-box d-flex flex-column align-items-stretch">
                                        <div class="icon"><i class="bx bx-desktop"></i></div>
                                        <h4><a href="">School of Computing (SOC)</a></h4>
                                        <p>Our comprehensive degree program in Computer Science consists three course that are AI Development and Data Science, blockchain and Full-Stack Development.</p>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="SOC" id="SOC" value="1" />
                                            <label class="form-check-label" for="SOC">Select</label>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">{{ __('Rank') }}</button>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 mt-4" data-aos="fade-up" data-aos-delay="450">
                                    <div class="icon-box d-flex flex-column align-items-stretch">
                                        <div class="icon"><i class="bx bx-desktop"></i></div>
                                        <h4><a href="">Interactive Design and Development (SIDD)</a></h4>
                                        <p>The program specializes in teaching user-centered design for creating apps and websites, equipping students with vital skills for success in the evolving digital technology sector.</p>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="SIDD" id="SIDD" value="1" />
                                            <label class="form-check-label" for="SIDD">Select</label>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">{{ __('Rank') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <section id="rank" class="services">
                <div class="container">
                    <div class="section-title">
                        <span>Rank</span>
                        <h2>Rank</h2>

                        <div class="d-flex mb-4" style="justify-content: center;">
                            <button id="socButton" onclick="showTable('socTable')" style="background-color: #ff7f18; color: white; font-size: 16px; border-radius: 4px; margin-top: 20px; padding: 8px 12px;">School of Computing</button>
                            <button id="siddButton" onclick="showTable('siddTable')" style="margin-left: 20px; background-color: white; border: 1px solid #ff7f18; font-size: 16px; border-radius: 4px; margin-top: 20px; padding: 8px 12px;">
                                School of Interactive Design & Development
                            </button>
                        </div>
                    </div>

                    <div id="socTable" class="table-container" style="overflow: auto; max-height: 600px;">
                        <div class="table-responsive">
                            @php $students = \App\Models\Student::where('SOC', 1)->orderByDesc('TOTAL')->get(); $rank = 1; @endphp @if($students->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Index No.</th>
                                        <th>Name</th>
                                        <th>CID Number</th>
                                        <th>School</th>
                                        <th>Total Marks</th>
                                        <th>Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $student->NAME }}</td>
                                        <td>{{ $student->CID }}</td>
                                        <td>{{ $student->SCHOOL }}</td>
                                        <td>{{ $student->TOTAL }}</td>
                                        <td>{{ $rank++ }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('studentDownloadSoc') }}" title="Download Data">
                                <i class="fa fa-download" aria-hidden="true"></i> Download
                            </a>
                            @else
                            <p>No student found.</p>
                            @endif @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div id="siddTable" class="table-container" style="display: none; overflow: auto; max-height: 600px;">
                        <div class="table-responsive">
                            @php $students = \App\Models\Student::where('SIDD', 1)->orderByDesc('TOTAL')->get(); $rank = 1; @endphp @if($students->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Index No.</th>
                                        <th>Name</th>
                                        <th>CID Number</th>
                                        <th>School</th>
                                        <th>Total Marks</th>
                                        <th>Rank</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ str_pad($student->INDEX_NO, 12, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $student->NAME }}</td>
                                        <td>{{ $student->CID }}</td>
                                        <td>{{ $student->SCHOOL }}</td>
                                        <td>{{ $student->TOTAL }}</td>
                                        <td>{{ $rank++ }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                <a href="{{ route('studentDownloadSid') }}" title="Download Data">
                                    <i class="fa fa-download" aria-hidden="true"></i> Download
                                </a>

                                @else
                                <p>No student found.</p>
                                @endif @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </section>

            <section id="pricing" class="pricing">
                <div class="container">
                    <div class="section-title">
                        <span>Criteria</span>
                        <h2>Criteria</h2>
                        <p>Entry requirement for School of Computing and Interactive Design and Development</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 mt-4 mt-md-0" data-aos="zoom-in">
                            <div class="box featured">
                                <h3>Criteria for SOC</h3>
                                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20230911173805/What-is-Artiificial-Intelligence(AI).webp" alt="" class="img-fluid rounded-top" style="padding: 0; height:300px;max-width:600px" />
                                <h3 style="text-align: center; margin: 20px;">Admission criteria for Computer Science</h3>
                                <p style="text-align: center; margin: 10px;">1. Class 12 Science passed students with a minimum of 50% in Mathematics</p>
                                <p style="text-align: center; margin: 10px;">
                                    2. Ability Rating <br />
                                    Mathematics - x5 <br />
                                    English - x2 <br />
                                    3 other subjects - x1
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 mt-4 mt-md-0" data-aos="zoom-in">
                            <div class="box featured">
                                <h3>Criteria for SOC</h3>
                                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgoMMqknO90jEiq6nc5rau_ooYAftKje2HYNRYRMzcydK9cqFaQgZj92BoPmS6Y2nAZFJrX5MvtM1wMSAniE4hlB9q7y9zPVMRhf6Ka19UDt5Awq6or-tTxXhEUJFwUjoE3fKrBf6zlFULwr2pAV7AxDql3if5sGTNPxzXSut0bI2Ty3Rrbrxv-dQhb/s490/myhc_89683.jpg" alt="" class="img-fluid rounded-top" style="padding: 0; height:300px;max-width:600px"/>
                                <h3 style="text-align: center; margin: 20px;">Admission criteria for Computer Science</h3>
                                <p style="text-align: center; margin: 10px;">1. Class 12 Science passed students with a minimum of 50% in Mathematics</p>
                                <p style="text-align: center; margin: 10px;">
                                    2. Ability Rating <br />
                                    Mathematics - x5 <br />
                                    English - x2 <br />
                                    3 other subjects - x1
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="team" class="team">
                <div class="container">
                    <div class="section-title">
                        <span>Team</span>
                        <h2>Team</h2>
                        <p>If you want to know more about the websites contact any of the team member.</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('newAssets/assets/img/team/SANGA.jpeg') }}" alt="" />
                                <h4>Sanga Tenzin</h4>
                                <span>Backend Developer</span>

                                <div class="social">
                                    <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/sanga.tenzin.182" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/sanga4063/" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="" target="_blank"><i class="bi bi-telegram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('newAssets/assets/img/team/hang.jpeg') }}" alt="" />
                                <h4>Yudhistra Hang Subba</h4>
                                <span>Project Leader / Backend Developer</span>

                                <div class="social">
                                    <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/ram.subba.5015" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/y.d.luffy9/" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="" target="_blank"><i class="bi bi-telegram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('newAssets/assets/img/team/pk.jpg') }}" alt="" />
                                <h4>Purna Kumar Limbu</h4>
                                <span>Backend Developer</span>

                                <div class="social">
                                    <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/profile.php?id=100088620913771" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="" target="_blank"><i class="bi bi-telegram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('newAssets/assets/img/team/sonam.jpeg') }}" alt="" />
                                <h4>Sonam Dekey</h4>
                                <span>Frontend Developer</span>

                                <div class="social">
                                    <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/sonam.dekey.5011" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/call_me_dekey/" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="" target="_blank"><i class="bi bi-telegram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('newAssets/assets/img/team/ugyen.jpeg') }}" alt="" />
                                <h4>Ugyen Kezang</h4>
                                <span>Frontend Developer</span>

                                <div class="social">
                                    <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/ugye.kezang.9" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/scarlet_xii/" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="" target="_blank"><i class="bi bi-telegram"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in">
                            <div class="member">
                                <img src="{{ asset('newAssets/assets/img/team/tsewang.jpeg') }}" alt="" />
                                <h4>Tshewang Norbu</h4>
                                <span>Frontend Developer</span>

                                <div class="social">
                                    <a href="" target="_blank"><i class="bi bi-whatsapp"></i></a>
                                    <a href="https://www.facebook.com/kelwangnorbu.dorjee" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/tshewang_norbuu_wangchuk/" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="" target="_blank"><i class="bi bi-telegram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact" class="contact">
                <div class="container">
                    <div class="section-title">
                        <span>Contact</span>
                        <h2>Contact</h2>
                        <p>Get in touch with our websites for CTT Ranking</p>
                    </div>

                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-6">
                            <div class="info-box mb-4">
                                <i class="bx bx-map"></i>
                                <h3>Gyelpozhing College of Information Technology</h3>
                                <p>Chamjekha,Thimphu, Bhutan</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="info-box mb-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info.gcit@rub.edu.bt</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="info-box mb-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>Tel No.: 02-361196/02-361195</p>
                            </div>
                        </div>
                    </div>

                    <div class="row" data-aos="fade-up">
                        <div class="col-lg-6">
                            <iframe
                                class="mb-4 mb-lg-0"
                                src="https://maps.google.com/maps?q=Gyalpozhing%20College%20of%20information%20Technology%20Thimphu&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                frameborder="0"
                                style="border: 0; width: 100%; height: 384px;"
                                allowfullscreen
                            ></iframe>
                        </div>

                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            @if(Session::has('form2_success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('form2_success') }}
                            </div>
                            @endif @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                            @endif

                            <form class="p-4 rounded contact-form" method="POST" action="{{ route('studentFeedback') }}" style="border: 1px solid #ff7f18;">
                                @csrf
                                <div class="form-group mt-3">
                                    <h1 style="font-size: 24px;">Feedback</h1>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required />
                                </div>
                                <div class="form-group mt-3">
                                    <textarea id="message" name="message" class="form-control" rows="6" cols="10" placeholder="Message" required></textarea>
                                </div>

                                <div class="text-start">
                                    <button class="btn text-white py-1 px-3 mt-3" style="background-color: #ff7f18;" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer id="footer">
            <div class="container">
                <div class="copyright">
                    Copyright &copy; <strong><span>Gyalpozhing College of Information Technology 2023.</span></strong> All Rights Reserved
                </div>
            </div>
        </footer>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <div id="preloader"></div>

        <script src="{{ asset('newAssets/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('newAssets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('newAssets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('newAssets/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('newAssets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('newAssets/assets/vendor/php-email-form/validate.js') }}"></script>

        <script src="{{ asset('newAssets/assets/js/main.js') }}"></script>

        <script>
            function validateForm() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                var error = document.getElementById("checkboxError");
                var selectedValues = document.getElementById("selectedValues");

                selectedValues.innerHTML = "";

                checkboxes.forEach(function (checkbox) {
                    var value = checkbox.checked ? "1" : "0";
                    selectedValues.innerHTML += checkbox.parentElement.textContent + ": " + value + "<br>";
                });

                var selectedCheckboxes = Array.from(checkboxes).filter((checkbox) => checkbox.checked);

                if (selectedCheckboxes.length < 1) {
                    error.style.display = "block";
                    return false;
                } else {
                    error.style.display = "none";
                    return true;
                }
            }
        </script>

        <script>
            var applyDate = new Date("<?php echo $applyDateJsFormat; ?>");
            var currentDate = new Date();

            if (currentDate > applyDate) {
                document.querySelectorAll('#SOC, #SIDD, button[type="submit"]').forEach(function (element) {
                    element.disabled = true;
                });

                var errorMessage = "Application period has ended.";
                var errorDiv = document.getElementById("errorDiv");

                if (errorDiv) {
                    var disabledMessage = document.createElement("p");
                    disabledMessage.innerText = errorMessage;
                    disabledMessage.style.color = "red";
                    disabledMessage.style.textAlign = "center";

                    errorDiv.appendChild(disabledMessage);
                } else {
                    console.error("Error div not found!");
                }
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("socTable").style.display = "block";
                document.getElementById("siddTable").style.display = "none";
            });

            function showTable(tableId) {
                var socButton = document.getElementById("socButton");
                var siddButton = document.getElementById("siddButton");

                if (tableId === "socTable") {
                    document.getElementById("socTable").style.display = "block";
                    document.getElementById("siddTable").style.display = "none";

                    socButton.style.backgroundColor = "#FF7F18";
                    socButton.style.color = "white";
                    socButton.style.border = "none";

                    siddButton.style.backgroundColor = "white";
                    siddButton.style.color = "#FF7F18";
                    siddButton.style.border = "1px solid #FF7F18";
                } else {
                    document.getElementById("socTable").style.display = "none";
                    document.getElementById("siddTable").style.display = "block";

                    socButton.style.backgroundColor = "white";
                    socButton.style.color = "#FF7F18";
                    socButton.style.border = "1px solid #FF7F18";

                    siddButton.style.backgroundColor = "#FF7F18";
                    siddButton.style.color = "white";
                    siddButton.style.border = "none";
                }
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            $(document).ready(function () {
                $(".mobile-nav-toggle").on("click", function () {
                    $("#mobileNavModal").modal("toggle");
                });

                $("#mobileNavModal .close").on("click", function () {
                    $("#mobileNavModal").modal("hide");
                });

                $("#mobileNavModal .modal-body ul li").on("click", function () {
                    $("#mobileNavModal").modal("hide");
                });
            });
        </script>
    </body>
</html>
