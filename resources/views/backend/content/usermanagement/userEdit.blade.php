@extends('backend.Main')
@section('content')
<form method="post" action={{route('user.update', $editUser->id)}} enctype="multipart/form-data" >
    @csrf
    @method('PUT')

          <div class="bg-warning mt-4 p-5 rounded shadow">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
            <div class="modal-body">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input value="{{$editUser->name}}" name="name" type="text" class="form-control"  placeholder="Enter blog title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input value="{{$editUser->email}}" name="email" type="text" class="form-control"  placeholder="Enter blog description">
                        {{-- <textarea value="{{ $blog->blog_description}}" name="blog_description" type="text" class="form-control"  placeholder="Enter blog description"></textarea> --}}
                        {{-- <textarea value="{{ $blog->blog_description}}" class="form-control" name="blog_description" id="exampleFormControlTextarea1" rows="3"></textarea> --}}
                    </div>


                    <div class="mt-3">

                    <select class="form-select" name="role" aria-label="Default select example">
                        <option selected> select role</option>
                        <option value="Author">Author</option>
                        <option value="admin">admin</option>
                      </select>

                    </div>

                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>

          </div>

  </form>
  @endsection
