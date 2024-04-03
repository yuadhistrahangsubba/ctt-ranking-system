<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .pt {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
        a {
            text-decoration: none;
        }
        .forget-password-section {
            background-color: #E48310;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .forget-password-form {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: rgb(99 99 99 / 20%) 0px 2px 8px 0px;
        }

        .forget-password-form i {
            text-align: center;
            font-size: 24px;
            display: block;
            margin-bottom: 2rem;
        }

        .forget-password-form h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            color: #23242A;
        }

        .p-tag {
            text-align: center;
            font-size: 16px;
            color: #23242A;
        }

        .btn {
            width: 200px;
            height: 48px;
            margin: 10px;
        }

        .first {
            background-color: #00C72C;
            color: #fff;
            font-size: 24px;
        }

        .first:hover {
            background-color: #E48310;
        }
        .second {
            background-color: #FF0909;
            color: #fff;
            font-size: 24px;
        }

        .second:hover {
            background-color: #f02ee0;
        }
    </style>
</head>
    <body>
    <section class="forget-password-section pt">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="forget-password-form">
                        <h1>Reset your Password</h1>
                        <p class="p-tag">Please provide the email address that you used when you signed up for your account.</p>
                        <div class="button-container">
                            <button type="submit" class="btn first">Register</button>
                            <button type="submit" class="btn second">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
