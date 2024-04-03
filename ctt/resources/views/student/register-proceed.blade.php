<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .validation-message {
            opacity: 0;
            transition: opacity 0.5s;
        }
        .valid {
            color: green;
        }
        .invalid {
            color: red;
        }

        /*Css for body*/
        .pt {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
        a {
            text-decoration:none;
        }
        .forget-password-section {
            background-color: #E48310;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .forget-password-section .forget-password-form {
            background: #fff;
            padding: 2rem;
            color: #0F3D3E;
            border: 3px solid #fff;
            border-radius: 17px;
            box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
        }
        .forget-password-section .forget-password-form i {
            text-align: center;
            font-size: 16px;
            display: block;
            margin-bottom: 2rem;
        }
        .forget-password-section .forget-password-form input {
            padding: 0.7rem;
            margin-top: 20px;
        }
        .forget-password-section .forget-password-form h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 200;
            color: #23242A;
        }
        .p-tag {
            text-align: center;
            font-size: 16px;
            color: #23242A;
        }
        .forget-password-section .forget-password-form button {
            width: 100%;
            background-color: #E48310;
            color: #fff;
            font-size: 21px;
            margin-top: 1rem;
        }
        .forget-password-section .forget-password-form button:hover {
            background-color: #00C72C;
            border: 2px solid #fff;
        }
        .forget-password-section .forget-password-form .back {
            margin-top: 2rem;
            font-weight: 600;
            color: red;
            text-align: center;
        }
    </style>
</head>

    <body >
        <section class="forget-password-section pt">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="forget-password-form">
                            <h1>Please provide email and phone number to provide</h1>
                            <p class="p-tag">Please provide the email address and phone number to confirm your account signup.</p>
                            <form id="resetPasswordForm">
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="emailInput" placeholder="Email Address">
                                    <div id="emailValidationMessage" class="validation-message"></div>

                                    <input type="text" class="form-control" id="phoneInput" placeholder="Phone Number" pattern="\d{8}">
                                    <div id="phoneValidationMessage" class="validation-message"></div>
                                </div>
                                <p class="p-tag">If you want to change default password, you can use this email address and phone number.</p>
                                <button type="submit" class="btn">Confirm</button>
                            </form>
                            <a href="login.html"><p class="back">Go Back</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Get the email input and validation message elements
            var emailInput = document.getElementById('emailInput');
            var emailValidationMessage = document.getElementById('emailValidationMessage');

            // Get the phone input and validation message elements
            var phoneInput = document.getElementById('phoneInput');
            var phoneValidationMessage = document.getElementById('phoneValidationMessage');

            // Improved regular expression for email validation
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Regular expression to match a valid 8-digit phone number format
            var phoneRegex = /^\d{8}$/;

            if (emailInput.value.trim() === '') {
                // Email is empty, display the error message
                emailValidationMessage.textContent = 'Email address is required';
                emailValidationMessage.classList.remove('valid');
                emailValidationMessage.classList.add('invalid');
            } else if (emailRegex.test(emailInput.value)) {
                // Email is valid, apply animation and style
                emailValidationMessage.textContent = 'Valid email';
                emailValidationMessage.classList.remove('invalid');
                emailValidationMessage.classList.add('valid');
            } else {
                // Email is invalid, apply animation and style
                emailValidationMessage.textContent = 'Invalid email';
                emailValidationMessage.classList.remove('valid');
                emailValidationMessage.classList.add('invalid');
            }

            if (phoneInput.value.trim() === '' || phoneInput.value === null) {
                // Phone number is empty or null, display an error message
                phoneValidationMessage.textContent = 'Invalid phone number (8 digits required)';
                phoneValidationMessage.classList.remove('valid');
                phoneValidationMessage.classList.add('invalid');
            } else if (phoneRegex.test(phoneInput.value)) {
                // Phone number is valid, display a success message
                phoneValidationMessage.textContent = 'Valid phone number';
                phoneValidationMessage.classList.remove('invalid');
                phoneValidationMessage.classList.add('valid');
            } else {
                // Phone number is invalid, display an error message
                phoneValidationMessage.textContent = 'Invalid phone number (8 digits required)';
                phoneValidationMessage.classList.remove('valid');
                phoneValidationMessage.classList.add('invalid');
            }

            // Add animation for the validation messages
            emailValidationMessage.style.opacity = 1;
            phoneValidationMessage.style.opacity = 1;

            // Hide the validation messages after 3 seconds (3000 milliseconds)
            setTimeout(function () {
                emailValidationMessage.style.opacity = 0;
                phoneValidationMessage.style.opacity = 0;
            }, 3000);
        });
    </script>

    </body>
</html>
