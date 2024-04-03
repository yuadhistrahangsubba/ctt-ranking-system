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
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <title>Home</title>
        <style>
           .custom-margin {
                margin: 10%;
                background-color:#E48310;
                width: 80%;
            }

            .dashboardStudent {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                margin: 0;
                background: linear-gradient(rgb(210, 243, 235, 1), rgba(230, 250, 245, .3)),url(../img/4.jpg) center center no-repeat;
                background-size: cover;
            }

        </style>
    </head>
    <body class="dashboardStudent">
        @include('student.studentNavbar')

        <div class="custom-margin">
            <div >
                <div style="background-color:white;margin:20px">
                    <div class="card-body">
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
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
                        </div>
                    </div>
                </div>

              <div class="col-lg-6 mb-5 mt-5 mx-auto" >
                <div class="card bg-glass">
                  <div class="card-body px-4 py-5 px-md-5">
                    <form method="POST" action="{{ route('studentDashboard') }}" onsubmit="return validateForm()" >
                        @csrf

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

                        <h4 class="mb-2 text-center" style="margin-top: -30px;">Rank yourself</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="SOC" id="SOC" value="1">
                            <label class="form-check-label" for="SOC">School of Computing</label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="SIDD" id="SIDD" value="1">
                            <label class="form-check-label" for="SIDD">School of Interactive Design</label>
                        </div>

                        <small class="text-danger" id="checkboxError" style="display: none;">Please select at least one checkbox.</small>

                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-light btn-lg px-5" style="background-color:#1D8348; font-size: 18px; color: white; margin-top:20px" type="submit">{{ __('Rank') }}</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
        </div>

        @include('student.footer')
        <script>
            function validateForm() {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                var error = document.getElementById('checkboxError');
                var selectedValues = document.getElementById('selectedValues');

                selectedValues.innerHTML = '';

                checkboxes.forEach(function (checkbox) {
                    var value = checkbox.checked ? '1' : '0';
                    selectedValues.innerHTML += checkbox.parentElement.textContent + ': ' + value + '<br>';
                });

                var selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);

                if (selectedCheckboxes.length < 1) {
                    error.style.display = 'block';
                    return false;
                } else {
                    error.style.display = 'none';
                    return true;
                }
            }
        </script>

        <script>
            var applyDate = new Date("<?php echo $applyDateJsFormat; ?>");

            var currentDate = new Date();

            if (currentDate > applyDate) {
                document.querySelectorAll('#SOC, #SIDD, button[type="submit"]').forEach(function(element) {
                    element.disabled = true;
                });

                var disabledMessage = document.createElement('p');
                disabledMessage.innerText = 'Application period has ended.';
                document.querySelector('.card-body').appendChild(disabledMessage);
            }
        </script>


    </body>
</html>
