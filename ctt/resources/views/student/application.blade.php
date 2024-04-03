<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

        <style>
            .custom-button {
                background-color: orange;
                color: white;
                width: 200px;
            }

            @media (max-width: 567px) and (min-width: 180px) {
                .custom-button {
                    width: 50%;
                    max-width: 300px;
                    font-size: 12px;
                }
            }
        </style>
    </head>
    <body>
        <section class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%; margin: 0; padding: 0; background: url(../img/4.jpg) center center no-repeat;background-size: cover;">
            <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
                <div class="row mb-5 justify-content-center">
                    <div class="col-lg-8 mb-5 mb-lg-0" style="display: flex; justify-content: center; align-items: center;">
                        <div class="col-10">
                            <div class="card bg-glass">
                                <div class="card-body px-4 py-5 px-md-5">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('success') }}
                                    </div>
                                    @endif @if(Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ route('application') }}">
                                        @csrf
                                        <h4 class="mb-2 text-center" style="margin-top: -30px;">Request to create account</h4>

                                        <!-- 1 -->
                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="sid">Student Index No. (SID)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                        <input type="text" name="sid" id="sid" class="form-control" placeholder="SID" required pattern="[0-9]{12}" />
                                                    </div>
                                                    <small class="text-danger" id="sidError">SID must be an 12-digit number.</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="cid">Citizen Identity No. (CID)</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                        <input type="text" name="cid" id="cid" class="form-control" placeholder="CID" required pattern="[0-9]{11}" />
                                                    </div>
                                                    <small class="text-danger" id="cidError">CID must be an 11-digit number.</small>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- 2 --}}
                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="name">Name</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                        <input type="text" name="name" id="name" class="form-control" placeholder="Username" required />
                                                    </div>
                                                    <small class="text-danger" id="nameError">Name must not contain numbers.</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="dob">Date of Birth</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-cake-candles"></i></span>
                                                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" required />
                                                    </div>
                                                    <small class="text-danger" id="dobError">Invalid date of birth.</small>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- 3 --}}

                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="email">Email</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required />
                                                    </div>
                                                    <small class="text-danger" id="emailError">Invalid Email.</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="phone">Phone No.</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required />
                                                    </div>
                                                    <small class="text-danger" id="phoneError">Invalid phone number.</small>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- 4 --}}

                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="school">School</label>
                                                    <div class="input-group" style="margin-bottom: 15px;">
                                                        <select name="school" id="school" class="form-select" required>
                                                            <option value="" selected disabled>Select your school</option>
                                                            <option>RINCHEN HIGHER SECONDARY SCHOOL</option>
                                                            <option>YANGCHENPHUG HIGHER SECONDARY SCHOOL</option>
                                                            <option>BAJOTHANG HIGHER SECONDARY SCHOOL</option>
                                                            <option>BAYLING CENTRAL SCHOOL</option>
                                                            <option>CHUKHA CENTRAL SCHOOL</option>
                                                            <option>DAMPHU CENTRAL SCHOOL</option>
                                                            <option>DRUKGYEL CENTRAL SCHOOL</option>
                                                            <option>GELEPHU HIGHER SECONDARY SCHOOL</option>
                                                            <option>GYALPOIZHING HIGHER SECONDARY SCHOOL</option>
                                                            <option>JAKAR HIGHER SECONDARY SCHOOL</option>
                                                            <option>JIGME SHERUBLING CENTRAL SCHOOL</option>
                                                            <option>KELKI HIGHER SECONDARY SCHOOL</option>
                                                            <option>MONGAR HIGHER SECONDARY SCHOOL</option>
                                                            <option>MOTITHANG HIGHER SECONDARY SCHOOL</option>
                                                            <option>NANGKOR CENTRAL SCHOOL</option>
                                                            <option>NIMA HIGHER SECONDARY SCHOOL</option>
                                                            <option>PHUENTSHOLING HIGHER SECONDARY SCHOOL</option>
                                                            <option>LHUENTSE HIGHER SECONDARY SCHOOL</option>
                                                            <option>PUNAKHA CENTRAL SCHOOL</option>
                                                            <option>RANGJUNG CENTRAL SCHOOL</option>
                                                            <option>YONTEN KUENJUNG ACADEMY</option>
                                                            <option>SHERUBLING CENTRAL SCHOOL</option>
                                                            <option>SAMTSE HIGHER SECONDARY SCHOOL</option>
                                                            <option>WANGCHUK ACADEMY</option>
                                                            <option>UGYEN ACADEMY HIGHER SECONDARY SCHOOL</option>
                                                            <option>GONGZIM UGYEN DORJI CENTRAL SCHOOL</option>
                                                            <option>ZHEMGANG CENTRAL SCHOOL</option>
                                                            <option>DAGA CENTRAL SCHOOL</option>
                                                            <option>DRUKJEGANG CENTRAL SCHOOL</option>
                                                            <option>GASELO CENTRAL SCHOOL</option>
                                                            <option>SHARI HIGHER SECONDARY SCHOOL</option>
                                                            <option>GEDU HIGHER SECONDARY SCHOOL</option>
                                                            <option>GOMTU HIGHER SECONDARY SCHOOL</option>
                                                            <option>JAMPELING CENTRAL SCHOOL</option>
                                                            <option>NGANGLAM CENTRAL SCHOOL</option>
                                                            <option>PELJORLING HIGHER SECONDARY SCHOOL</option>
                                                            <option>SARPANG CENTRAL SCHOOL</option>
                                                            <option>SHABA HIGHER SECONDARY SCHOOL</option>
                                                            <option>TANGMACHU CENTRAL SCHOOL</option>
                                                            <option>DECHENTSEMO CENTRAL SCHOOL</option>
                                                            <option>TSENKHARLA CENTRAL SCHOOL</option>
                                                            <option>TRASHITSE HIGHER SECONDARY SCHOOL</option>
                                                            <option>DECHHENCHOELING HIGHER SECONDARY SCHOOL</option>
                                                            <option>SAMTENGANG CENTRAL SCHOOL</option>
                                                            <option>MENDREGANG CENTRAL SCHOOL</option>
                                                            <option>TENDRUK CENTRAL SCHOOL</option>
                                                            <option>YADI CENTRAL SCHOOL</option>
                                                            <option>DRAMETSE CENTRAL SCHOOL</option>
                                                            <option>BJISHONG CENTRAL SCHOOL</option>
                                                            <option>THE ROYAL ACADEMY</option>
                                                            <option>KUENDRUP HIGHER SECONDARY SCHOOL</option>
                                                            <option>LOSEL GYATSHO ACADEMY</option>
                                                            <option>BABESA HIGHER SECONDARY SCHOOL</option>
                                                            <option>DOROKHA CENTRAL SCHOOL</option>
                                                            <option>NORBULING CENTRAL SCHOOL</option>
                                                            <option>ORONG CENTRAL SCHOOL</option>
                                                            <option>PELRITHANG HIGHER SECONDARY SCHOOL</option>
                                                            <option>TASHIDINGKHA HIGHER SECONDARY SCHOOL</option>
                                                            <option>BARTSHAM CENTRAL SCHOOL</option>
                                                            <option>PELKHIL SCHOOL</option>
                                                            <option>SONAMTHANG CENTRAL SCHOOL</option>
                                                            <option>SHERUB RELDRI HIGHER SECONDARY SCHOOL</option>
                                                            <option>RIGZOM ACADEMY</option>
                                                            <option>YOEZERLING HIGHER SECONDARY SCHOOL</option>
                                                            <option>DASHIDING HIGHER SECONDARY SCHOOL</option>
                                                            <option>KIDHEYKHAR CENTRAL SCHOOL</option>
                                                            <option>PAKSHIKHA CENTRAL SCHOOL</option>
                                                            <option>DRUK SCHOOL</option>
                                                            <option>SAMCHOLING HIGHER SECONDARY SCHOOL</option>
                                                            <option>UTPAL ACADEMY</option>
                                                            <option>GESARLING CENTRAL SCHOOL</option>
                                                            <option>KARMALING HIGHER SECONDARY SCHOOL</option>
                                                            <option>DUNGSAM ACADEMY</option>
                                                            <option>JAMPEL HIGHER SECONDARY SCHOOL</option>
                                                            <option>CHUNDU ARMED FORCES PUBLIC SCHOOL</option>
                                                            <option>GOMDAR CENTRAL SCHOOL</option>
                                                            <option>MINJIWOONG CENTRAL SCHOOL</option>
                                                            <option>TSHANGKHA CENTRAL SCHOOL</option>
                                                            <option>WANGBAMA CENTRAL SCHOOL</option>
                                                            <option>YELCHEN CENTRAL SCHOOL</option>
                                                            <option>NORBU ACADEMY </option>
                                                            <option>KARMA ACADEMY </option>
                                                            <option>DESI HIGH SCHOOL</option>
                                                            <option>EDUCATING FOR LIFELONG CITIZENSHIP HIGH SCHOOL</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="year">Year of graduation</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="year" id="year" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="yearError">Invalid year.</small>
                                                </div>

                                            </div>
                                        </div>

                                        {{-- 5 --}}
                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="eng">English Mark</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="eng" id="eng" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="engError">Invalid marks.</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="math">MATH/BMT Marks</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="math" id="math" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="mathError">Invalid marks.</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="sub4">Dzongkha Marks</label>
                                                    <div class="input-group" style="margin-bottom: 15px;">
                                                        <select name="dzo" id="dzo" class="form-select" required>
                                                            <option value="" selected disabled>Select your subjects</option>
                                                            <option>DZO</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="dzo" id="dzo" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="dzoError">Invalid marks.</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="sub4">Sub4</label>
                                                    <div class="input-group" style="margin-bottom: 15px;">
                                                        <select name="sub4_name" id="sub4_name" class="form-select" required>
                                                            <option value="" selected disabled>Select your subjects</option>
                                                            <option>PHY</option>
                                                            <option>ECO</option>
                                                            <option>HIS</option>
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="sub4" id="sub4" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="sub4Error">Invalid marks.</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-6">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="sub5">Sub5</label>
                                                    <div class="input-group" style="margin-bottom: 15px;">
                                                        <select name="sub5_name" id="sub5_name" class="form-select" required>
                                                            <option value="" selected disabled>Select your subjects</option>
                                                            <option>CHEM</option>
                                                            <option>ACC</option>
                                                            <option>GEO</option>
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="sub5" id="sub5" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="sub5Error">Invalid marks.</small>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="sub6">Sub6</label>
                                                    <div class="input-group" style="margin-bottom: 15px;">
                                                        <select name="sub6_name" id="sub6_name" class="form-select" required>
                                                            <option value="" selected disabled>Select your subjects</option>
                                                            <option>BIO</option>
                                                            <option>MEDIA</option>
                                                            <option>RIGE</option>
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                                                        <input type="number" name="sub6" id="sub6" class="form-control" placeholder="Enter your marks" required />
                                                    </div>
                                                    <small class="text-danger" id="sub6Error">Invalid marks.</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <p class="small pb-lg-2 d-flex justify-content-between">
                                                <a class="text-black-50 text-primary" href="{{   url('/') }}"> {{ __('Already registered?') }}</a>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-primary btn-outline-light btn-lg px-5 custom-button" type="submit">{{ __('Send') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
                //SID
                $(document).ready(function () {
                    $('#sid').on('input', function () {
                        var sid = $(this).val();
                        var pattern = /^[0-9]{12}$/;

                        if (pattern.test(sid)) {
                            $('#sidError').text('');
                        } else {
                            $('#sidError').text('SID must be an 12-digit number.');
                        }
                    });

                //CID
                $('#cid').on('input', function () {
                    var cid = $(this).val();
                    var pattern = /^[0-9]{11}$/;

                    if (pattern.test(cid)) {
                        $('#cidError').text('');
                    } else {
                        $('#cidError').text('CID must be an 11-digit number.');
                    }
                });

                //Username
                $('#name').on('input', function () {
                    var name = $('#name').val();
                    var nameError = '';

                    if (/\d/.test(name)) {
                        nameError = 'Username must not contain numbers.';
                    }

                    $('#nameError').text(nameError);
                });

                //Date of birth
                $('#dob').on('input', function () {
                    var dob = $(this).val();
                    var currentDate = new Date();
                    var selectedDate = new Date(dob);

                    if (selectedDate <= currentDate) {
                        $('#dobError').text('');
                    } else {
                        $('#dobError').text('Invalid date of birth.');
                    }
                });

                $('#email').on('input', function () {
                    var email = $(this).val();
                    var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (pattern.test(email)) {
                        $('#emailError').text('');
                    } else {
                        $('#emailError').text('Invalid Email.');
                    }
                });

                $('#phone').on('input', function () {
                        var phone = $(this).val();
                        var pattern = /^[0-9]{8}$/;

                        if (pattern.test(phone)) {
                            $('#phoneError').text('');
                        } else {
                            $('#phoneError').text('Phone must be an 8-digit number.');
                        }
                    });

                // Input validation for school
                        $('#school').on('input', function () {
                    var school = $(this).val();

                    if (school.trim() !== '') {
                        $('#schoolError').text('');
                    } else {
                        $('#schoolError').text('School cannot be empty.');
                    }
                });

                //Year of graduation
                $('#year').on('input', function () {
                    var year = $(this).val();
                    var currentYear = new Date().getFullYear();

                    if (year !== '' && !isNaN(year) && year >= 0 && year <= currentYear) {
                        $('#yearError').text('');
                    } else {
                        $('#yearError').text('Year cannot be empty, negative, or greater than the current year.');
                    }
                });

                // Input validation for eng marks
                $('#eng').on('input', function () {
                    var eng = $(this).val();
                    if (eng < 0) {
                        $('#engError').text('Marks cannot be below zero.');
                    } else {
                        $('#engError').text('');
                    }
                });

                // Input validation for dzo marks
                $('#dzo').on('input', function () {
                    var dzo = $(this).val();
                    if (dzo < 0) {
                        $('#dzoError').text('Marks cannot be below zero.');
                    } else {
                        $('#dzoError').text('');
                    }
                });

                // Input validation for math marks
                $('#math').on('input', function () {
                    var math = $(this).val();
                    if (math < 0) {
                        $('#mathError').text('Marks cannot be below zero.');
                    } else {
                        $('#mathError').text('');
                    }
                });

                // Input validation for sub4 marks
                $('#sub4').on('input', function () {
                    var sub4 = $(this).val();
                    if (sub4 < 0) {
                        $('#sub4Error').text('Marks cannot be below zero.');
                    } else {
                        $('#sub4Error').text('');
                    }
                });

                // Input validation for sub5 marks
                $('#sub5').on('input', function () {
                    var sub5 = $(this).val();
                    if (sub5 < 0) {
                        $('#sub5Error').text('Marks cannot be below zero.');
                    } else {
                        $('#sub5Error').text('');
                    }
                });

                // Input validation for sub6 marks
                $('#sub6').on('input', function () {
                    var sub6 = $(this).val();
                    if (sub6 < 0) {
                        $('#sub6Error').text('Marks cannot be below zero.');
                    } else {
                        $('#sub6Error').text('');
                    }
                });

                // Form submission validation
                $('form').on('submit', function (event) {
                    var sub4Name = $('#sub4_name').val();
                    var sub5Name = $('#sub5_name').val();
                    var sub6Name = $('#sub6_name').val();

                    if (sub4Name === null || sub4Name === '') {
                        $('#sub4Error').text('Please select a subject for Sub4.');
                        event.preventDefault();
                    } else {
                        $('#sub4Error').text('');
                    }

                    if (sub5Name === null || sub5Name === '') {
                        $('#sub5Error').text('Please select a subject for Sub5.');
                        event.preventDefault();
                    } else {
                        $('#sub5Error').text('');
                    }

                    if (sub6Name === null || sub6Name === '') {
                        $('#sub6Error').text('Please select a subject for Sub6.');
                        event.preventDefault();
                    } else {
                        $('#sub6Error').text('');
                    }

                    if ($('#eng').val() < 0 || $('#dzo').val() < 0 || $('#math').val() < 0 || $('#sub4').val() < 0 || $('#sub5').val() < 0 || $('#sub6').val() < 0) {
                        event.preventDefault();
                        $('#engError').text('Marks cannot be below zero.');
                        $('#dzoError').text('Marks cannot be below zero.');
                        $('#mathError').text('Marks cannot be below zero.');
                        $('#sub4Error').text('Marks cannot be below zero.');
                        $('#sub5Error').text('Marks cannot be below zero.');
                        $('#sub6Error').text('Marks cannot be below zero.');
                    }
                });

            });
        </script>
    </body>
</html>
