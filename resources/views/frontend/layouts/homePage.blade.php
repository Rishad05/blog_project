@extends('frontend.Main');
@section('content')
    <!-- Begin List Posts
                 ================================================== -->
    <section class="recent-posts container">
        <div class="searchbar">
            <form action="">
                <input type="text" placeholder="Search..." name="search" />

                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>

            </form>
        </div>
        <div class="card-columns listrecent">
            @foreach ($blogs as $data)
                <!-- begin post -->
                <div class="card">
                    <a href={{ route('blog.details', $data) }}>
                        {{-- <img class="img-fluid" src="{{url('files/blogs/'.$data->image)}}" alt=""> --}}
                        <img class="img-fluid" src={{ asset('blogs/' . $data->image) }} alt="">
                    </a>
                    <div class="card-block">
                        {{-- <h2 class="card-title"></h2> --}}
                        <h4 class="card-text"><a href={{ route('blog.details', $data) }}>{{ $data->blog_title }}</a>
                        </h4>
                        <div class="metafooter">
                            <div class="wrapfooter">
                                <span class="meta-footer-thumb">
                                    {{-- <a href="author.html"><img class="author-thumb" src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="Sal"></a> --}}
                                    <img class="author-thumb"
                                        src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg"
                                        alt="Sal">
                                </span>
                                <span class="author-meta">
                                    <span class="post-name"><a><span class="text-muted">Written By</span>
                                            {{ $data->authorInfo->name }}</a></span><br />
                                    <span class="post-date">{{ $data->created_at->diffForHumans() }}</span><span
                                        class="dot"></span>

                                </span>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
            @endforeach




        </div>
    </section>
    <!-- End List Posts
                        ================================================== -->
@endsection
