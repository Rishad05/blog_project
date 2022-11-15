@extends('backend.authorMain')
@section('content')
    {{-- <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1>Create New Blog!</h1>
            {{-- @include('includes.flash-message') --}}
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('blog.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="blog_title" value="{{ old('title') }}" />
                    {{-- @error('title') --}}
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    {{-- <p style="color: red; margin-bottom:25px;">{{ $message }}</p> --}}
                    {{-- @enderror --}}
                    <!-- Image -->
                    <label for="image"><span>Image</span></label>
                    <input type="file" id="image" name="blog_image" />
                    {{-- @error('image') --}}
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    {{-- <p style="color: red; margin-bottom:25px;">{{ $message }}</p>
                @enderror --}}


                    <!-- Body-->
                    <label for="body"><span>Description</span></label>
                    <textarea id="body" name="blog_description"></textarea>
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
