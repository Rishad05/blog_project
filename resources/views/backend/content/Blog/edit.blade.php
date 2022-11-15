@extends('backend.authorMain')
@section('content')

<main class="container" style="background-color: #fff;">
    <section id="contact-us">
        <h1>Update Blog!</h1>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex justify-content-between">{{ $error }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
        @endif
        {{-- @include('includes.flash-message') --}}
        <!-- Contact Form -->
        <div class="contact-form">
            <form action="{{route('blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Title -->
                <label for="title"><span>Title</span></label>
                <input type="text" id="title" name="blog_title" value="{{$blog->blog_title}}"" />
                {{-- @error('title') --}}
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    {{-- <p style="color: red; margin-bottom:25px;">{{ $message }}</p> --}}
                {{-- @enderror --}}
                <!-- Image -->
                <img style="width: 150px;" class="mb-2" src="{{ asset('/blogs/' . $blog->image) }}" alt="">
                <br>
                <label for="image"><span>Image</span></label>
                <input type="file" id="image" name="blog_image" value="{{ $blog['blog_image'] }} />
                {{-- @error('image') --}}
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    {{-- <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror --}}
                <!-- Body-->
                <label for="body"><span>Description</span></label>
                <textarea id="body" name="blog_description">{{$blog->blog_description}}</textarea>
                {{-- @error('body') --}}
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    {{-- <p style="color: red; margin-bottom:25px;">{{ $message }}</p> --}}
                {{-- @enderror --}}
                <!-- Button -->
                <input type="submit" value="Submit" />
            </form>
        </div>
    </section>
</main>
@endsection
