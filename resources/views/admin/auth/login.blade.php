<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .btn  {
            color: #212529;
            background-color: #5b84c5;
            border-color: #5b84c5;
        }


    </style>
</head>
<body>



    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
    <div class="row">

        <div class="col-md-9 mx-auto">

            <form action="{{ route('adminLoginPost')}}" method="POST">
                @csrf
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <h2>Register -admin </h2>
                    </div>



                    <div class="mb-3">
                        <label for="password" class="form-label">Your Email :</label>
                        <input value="admin@admin.com" name="email" required type="email" class="form-control" id="password" aria-describedby="emailHelp">
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Your Password :</label>
                    <input value="password" name="password" required type="password" class="form-control" id="password" aria-describedby="emailHelp">
                </div>
                    <div class="mb-3">
                        <button class="btn" style="width: 27%;">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
     </div>
</div>

</body>
</html>
