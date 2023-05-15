<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>complete information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <style>
.informtion2{
    display: none;
}

  </style>
</head>
<body>

    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Pass</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Port</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="" >
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0">register in RS4IT</h6>
                </a>

            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">RS4IT</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link active">Home</a>

                            <a href="{{ route('user') }}" class="nav-item nav-link">Dashboard</a>

                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

<div class="container">
    <div class="row">

        <div class="col-md-9 mx-auto">

            <form action="{{ route('post.edit.user',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <h2>Add user</h2>
                        @if(Session::has('message'))
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        @endif
                    </div>

                    <div class="mb-3">
                            <label for="password" class="form-label"> Name</label>
                            <input required value="{{ $user->name }}" name="name" required type="text" class="form-control" id="password" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"> Email</label>
                        <input value="{{ $user->email }}" required name="email" required type="email" class="form-control" id="password" aria-describedby="emailHelp">
                   </div>

                   <div class="mb-3">
                    <label for="password" class="form-label"> Password</label>
                    <input value="" required name="password" required type="text" class="form-control" id="password" aria-describedby="emailHelp">
                  </div>

                   <div class="mb-3">
                    <label for="password" class="form-label">Phone</label>
                    <input name="phone"  value="{{ $user->phone }}" required type="text" class="form-control" id="password" aria-describedby="emailHelp">
                  </div>




                 <div class="mb-3">
                    <label for="password" class="form-label">Image</label>
                    <input name="image"  required type="file" class="form-control" id="password" aria-describedby="emailHelp">
                 </div>








                    <div class="mb-3">
                        <button class="btn btn-primary" style="    background-color: #0d6efd; ">Next >> </button>
                    </div>
                </div>

            </div>
        </form>
        <br>
        <br>
        <br>
        </div>
     </div>
</div>

</body>


<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




</html>
