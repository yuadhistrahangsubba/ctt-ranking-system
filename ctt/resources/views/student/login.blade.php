<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
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
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" >
    <div class="row gx-lg-5 align-items-center mb-5" >
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <div class="card bg-glass" style="height: 400px;">

                <div class="brand_logo_container">
                    <img src="{{ asset('assets/img/hospital.jpeg') }};" class="brand_logo" style="max-height: 400px; width:100%; padding:10px"  alt="Logo">
                </div>
              <h4 class="mt-1 mb-5 pb-1"></h4>

        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h4 class="mb-2 text-center" style="margin-top: -30px;">Login to your account</h4>

                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required/>
                    </div>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                        <span class="input-group-text toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <!-- Remember Me and Login Button -->
                <div class="form-group">
                    <p class="small pb-lg-2 d-flex justify-content-between">
                        <a class="text-black-50 text-primary" href="{{ route('Register') }}">Register</a>
                        <a class="text-black-50 text-primary" href="{{ route('forgotpassword') }}">Forgot password?</a>
                    </p>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary btn-outline-light btn-lg px-5 custom-button" type="submit">Login now</button>
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

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
