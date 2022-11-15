<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Travalicious</title>




    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


</head>

<body style="overflow-x: hidden;">
    <div class="row" style="padding: 40px;">
        <div class="col-md-6 m-auto">
            <form style="width: 560px; " class="bg-dark text-light shadow p-5 rounded"
                action="{{ route('userRegistration') }}" method="post" enctype="multipart/form-data">
                @if (session()->has('success'))
                    <div class="alert alert-success d-flex justify-content-between">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error-message'))
                    <div class="alert alert-danger d-flex justify-content-between">
                        {{ session()->get('error-message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <h1 class="fw-bolder text-center  p-3 ">Registration here</h1>
                <hr>
                @csrf
                <div class="mb-3 ">
                    <label for="name" class="form-label">Name:</label>
                    <input required type="text" class="form-control" id="name" name="name"
                        placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input name="email" required type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email address">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" required type="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-danger">Registration</button>
                <span class="text-center p-5"><a href={{ route('authorLogin') }}>Already have account?</a></span>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
