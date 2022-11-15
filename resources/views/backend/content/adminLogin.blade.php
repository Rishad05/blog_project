<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <div class="row" style="padding: 115px; background: linear-gradient(to bottom right, #ffffff 0%, #fcdcdc 100%);">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="col-md-6 m-auto">


            <form class="bg-dark text-light shadow p-5 rounded"  action="{{route('accessLogin.create')}}" method="post">
                <h1 class="fw-bolder text-center pt-3"> ADMIN LOGIN</h1>
            <hr>
                @csrf
                <div class="mb-3 mt-3">
                    {{-- <label for="exampleInputEmail1" class="form-label">Email address</label> --}}
                    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email address">
                </div>
                <div class="mb-3">
                    {{-- <label for="exampleInputPassword1" class="form-label">Password</label> --}}
                    <input required name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-danger">Login</button>
            </form>
        </div>

    </div>
