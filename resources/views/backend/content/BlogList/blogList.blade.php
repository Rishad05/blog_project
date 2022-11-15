@extends('backend.Main')
@section('content')


      <div class=" bg-light mt-4 p-5 rounded shadow ">
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

        <table class="table  table-sm pb-5 text-dark">
          <thead>
            <tr>
              <th>Blog_Id</th>
              <th>Image</th>
              <th>Tittle</th>
              <th>Author</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
        @foreach ($blog as $key=> $data)

      <tr>
        <th scope="row">{{$blog->firstItem()+$key}}</th>
        <td>
            <img style="width: 100px; height: 90px" src="{{ asset('blogs/' . $data->image) }}" alt="">
        </td>
        <td>{{$data->blog_title}}</td>
        <td>{{$data->authorInfo->name }}</td>
        <td>{!!$data->blog_description!!}</td>
        <td>

            <div class="dropdown">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>

                        @if ($data->status == 'Published')
                            <a class="btn" href="{{ route('statusUpdate', ['id' => $data->id, 'status' => 'Unpublished']) }}">Make Unpublished</a>
                        @elseif ( $data->status == 'Unpublished')
                            <a class="btn" href="{{ route('statusUpdate', ['id' => $data->id, 'status' => 'Published']) }}">Make Published</a>
                        @else
                            <a class="btn" href="">None</a>
                        @endif
                    </li>
                </ul>
            </div>
        </td>
      </tr>
      @endforeach

    </tbody>

        </table>
        {{$blog->links()}}
        <div class="p-5"></div>

      </div>
@endsection
