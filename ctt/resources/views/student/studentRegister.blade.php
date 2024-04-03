<!doctype html>
<html lang="en">

<head>
  <title>Register Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
  <main>
<section class="d-flex justify-content-center align-items-center"
style="width: 100%; height: 100vh; margin: 0; padding: 0;
background: url(../img/4.jpg) center center no-repeat;background-size: cover; ">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row mb-5 justify-content-center">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('studentRegister') }}">
                @csrf
              <h4 class=" mb-2 text-center " style="margin-top: -30px;">Register your account</h4>

              <div class="form-outline mb-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="SID">Student Index Number (SID)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                            <input type="text" name="SID" id="SID" class="form-control" placeholder="Student Index No."
                                required pattern="[0-9]{12}">
                        </div>
                        <small class="text-danger" id="SIDError">SID must be an 12-digit number.</small>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="CID">Citizen Identity Number (CID)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                            <input type="text" name="CID" id="CID" class="form-control" placeholder="Citizen Identity No."
                                required pattern="[0-9]{11}">
                        </div>
                        <small class="text-danger" id="CIDError">CID must be an 11-digit number.</small>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="DOB">Date of Birth</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-cake-candles"></i></span>
                            <input type="date" name="DOB" id="DOB" class="form-control" placeholder="Date of Birth" required>
                        </div>
                        <small class="text-danger" id="DOBError">Invalid date of birth.</small>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="name">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                        </div>
                        <small class="text-danger" id="nameError">Invalid Name.</small>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                        </div>
                        <small class="text-danger" id="emailError">Invalid Email address.</small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="phone">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number" required pattern="[0-9]{8}">
                        </div>
                        <small class="text-danger" id="phoneError">Invalid Phone number.</small>
                    </div>
                </div>
            </div>

            <div class="form-outline mb-6">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            <span class="input-group-text toggle-password" onclick="togglePassword('password')">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <small class="text-danger" id="passwordError"></small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="confirmpassword">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" required>
                            <span class="input-group-text toggle-password" onclick="togglePassword('confirmpassword')">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <small class="text-danger" id="passwordError"></small>
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-top:20px">
                <p class="small pb-lg-2 d-flex justify-content-between">
                    <a class="text-black-50 text-primary" href="{{  url('/') }}"> {{ __('Already registered?') }}</a>
                    <a class="text-black-50 text-primary" href="{{  route('application') }}">Send Request</a>
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary btn-outline-light btn-lg px-5 custom-button" type="submit">{{ __('Register') }}</button>
            </div>
            </form>
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

<script>
        //SID
        $(document).ready(function () {
            $('#SID').on('input', function () {
                var SID = $(this).val();
                var pattern = /^[0-9]{12}$/;

                if (pattern.test(SID)) {
                    $('#SIDError').text('');
                } else {
                    $('#SIDError').text('SID must be an 12-digit number.');
                }
            });

        //CID
        $('#CID').on('input', function () {
            var CID = $(this).val();
            var pattern = /^[0-9]{11}$/;

            if (pattern.test(CID)) {
                $('#CIDError').text('');
            } else {
                $('#CIDError').text('CID must be an 11-digit number.');
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
        $('#DOB').on('input', function () {
            var DOB = $(this).val();
            var currentDate = new Date();
            var selectedDate = new Date(DOB);

            if (selectedDate <= currentDate) {
                $('#DOBError').text('');
            } else {
                $('#DOBError').text('Invalid date of birth.');
            }
        });
        //email
        $('#email').on('input', function () {
            var email = $('#email').val();
            var emailError = '';
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(email)) {
                emailError = 'Invalid Email address.';
            }

            $('#emailError').text(emailError);
        });

        //phone number
        $('#phone').on('input', function () {
            var phone = $('#phone').val();
            var phoneError = '';

            var phonePattern = /^[0-9]{8}$/;

            if (!phonePattern.test(phone)) {
                phoneError = 'Phone number must be an 8-digit number.';
            }

            $('#phoneError').text(phoneError);
        });

        //password and confirm password
        $('#password, #confirmpassword').on('input', function () {
        var password = $('#password').val();
        var confirmPassword = $('#confirmpassword').val();
        var passwordError = '';

        var pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (password.length < 8) {
            passwordError = 'Password must be at least 8 characters long.';
        } else if (password !== confirmPassword) {
            passwordError = 'Passwords do not match.';
        }

        $('#passwordError').text(passwordError);
    });

        document.getElementById('yourFormId').submit();

    });
</script>


<script>
    function togglePassword(inputId) {
        var input = document.getElementById(inputId);
        var eyeSlash = input.parentElement.querySelector('.toggle-password i');

        if (input.type === 'password') {
            input.type = 'text';
            eyeSlash.classList.remove('fa-eye-slash');
            eyeSlash.classList.add('fa-eye');
        } else {
            input.type = 'password';
            eyeSlash.classList.remove('fa-eye');
            eyeSlash.classList.add('fa-eye-slash');
        }
    }
</script>
</body>
</html>
