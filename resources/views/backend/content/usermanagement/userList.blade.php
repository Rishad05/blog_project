@extends('backend.Main')
@section('content')


      <div class=" bg-dark mt-4 p-5 rounded shadow ">
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
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif
<!-- Button trigger modal -->
<h2 class="float-start text-light text-center border-buttom ">List Of User</h2>
<button type="button" class="btn btn-warning float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create user
  </button>

  <!-- Modal -->
  <form method="post" action={{route('user.create')}} enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create a new User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    {{-- <div class="form-gorup">
                        
                        <label for="">Upload Image</label>
                        <input name="author_image" type="file" class="form-control">
                    </div> --}}

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Blog Tittle">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email address">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" required type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
                    </div>

            
                    <select class="form-select" name="role" aria-label="Default select example">
                        <option selected> select role</option>
                        <option value="Author">Author</option>
                        <option value="admin">admin</option>
                      </select>
                      

                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">OK</button>
            </div>
          </div>
        </div>
      </div>
  </form>
  {{-- @if (auth()->user()->id) --}}
  {{-- dd($user); --}}
        <table class="table  table-sm pb-5 text-light">
          <thead>
            <tr>
              <th>User Id</th>
              {{-- <th>Image</th> --}}
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              {{-- <th>Action</th> --}}
            </tr>
          </thead>
        @foreach ($user as $key=> $data)

      <tr>
        {{-- <th scope="row">{{$data->firstItem()+$key}}</th> --}}
        {{-- <th scope="row">{{$data->id}}</th> --}}
        <td>{{$data->id}}</td>
        {{-- <td>
            <img style="width: 100px; height: 90px" src="{{ asset('users/' . $data->image) }}" alt="">
        </td> --}}
        <td>{{$data->name}}</td>
        {{-- <td>{{$data->courseAuthor->author_name}}</td> --}}
        <td>{{$data->email}}</td>
        <td>{{$data->role}}</td>

        {{-- <td>
            <a class="btn btn-info" href="{{route('viewLesson', $data['id'])}}">view lesson </a>
            <a class="btn btn-info" href="{{route('viewAssignment', $data['id'])}}">View Assignment </a>
        </td> --}}

            {{-- <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"> --}}

                    {{-- <li class="bg-info"><a class="btn" href={{route('blog.edit', $data['id'])}}>Edit</span></a></li>
                    <li class="bg-danger"><a class="btn btn-danger" href={{ route('blog.delete', $data['id']) }}>Delete</a></li> --}}
{{-- 
                </ul>
            </div> --}}


            <td>

              <div class="dropdown">
                  <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Action
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  
                      <li class="bg-info"><a class="btn" href={{route('user.edit', $data['id'])}}>Edit</span></a></li>
                      <li class="bg-danger"><a class="btn btn-danger" href={{ route('user.delete', $data['id']) }}>Delete</a></li>
  
                  </ul>
              </div>
  
  
          </td>


      </tr>
      @endforeach

    </tbody>

        </table>
        {{-- @endif --}}
        {{-- {{$blog->links()}} --}}
        {{-- <div class="p-5"></div> --}}

      </div>
@endsection
