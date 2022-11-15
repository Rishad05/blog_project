<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="../../../../public/css/carousel.css" rel="stylesheet"> --}}
    <title>Travelicious</title>
    <style>
        .static {
            color: #fff;
            position: absolute;
            top: 30%;
            width: 96.6667%;
            height: 200px;
        }

        .carousel-item:after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
        }

        .carouselImg {
            width: 100%;
            height: 500px;

        }

        .blogStyle {
            text-align: justify;
            text-justify: inter-word;
        }

    </style>
</head>

<body style="overflow-x: hidden;">
    <section class=" text-center fluid-container">

        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner carouselImg">
                    <div class="carousel-item active ">
                        <img src={{ asset('blogs/' . $blog->image) }} class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-next px-0" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                </button>
                <div class="col-lg-6 col-md-8 mx-auto static">
                    <h1 class="fw-light fw-bolder text-info">{{ $blog->blog_title }}</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container" style="text-align: justify;
    text-justify: inter-word; padding:3em;">
        <span>{!! $blog->blog_description !!}</span>
        <hr>
    </section>

    {{-- <div class="response container">
        <h4>Response</h4>
        @forelse ($blog->comments as $comment)
        <div class="media response-info ">
            <div class="media-left response-text-left">
                <img class="author-thumb rounded" style="width:30px; height:30px; margin-left:20px;" src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="Sal">
                <h6 class="text-muted">{{$comment->user->name}}</h6>
            </div>
            <div class="media-body response-text-right">
                <p class="bolder"><strong>{{$comment->user_comment}}</strong></p>
                    <ul style="list-style: none; width:350px;" class="d-flex justify-content-between">
                        <li>{{$comment->created_at->format('M d Y')}}</li>
                        <li >{{$comment->created_at->diffForHumans()}}</li>
                        <li><a style="color: gray; padding:10px; text-decoration:none;" href="#comments" onclick="document.getElementById('comment_id').value = {{$comment->id}}">Reply</a></li>
                    </ul>
                    @forelse ($comment->replies as $reply )
                    <div class="media response-info container" style="margin-left:50px;">
                        <div class="media-left response-text-left">
                            <img class="author-thumb rounded" style="width:30px; height:30px; margin-left:20px;" src="https://st.depositphotos.com/2101611/3925/v/600/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg" alt="Sal">
                            <h6 class="text-muted">{{$reply->user->name}}</h6>
                        </div>
                        <div class="media-body response-text-right">
                            <p class="bolder"><strong>{{$reply->user_comment}}</strong></p>
                                <ul style="list-style: none; width:250px;" class="d-flex justify-content-between">
                                    <li>{{$reply->created_at->format('M d Y')}}</li>
                                    <li >{{$reply->created_at->diffForHumans()}}</li>
                                </ul>
                        </div>
                    </div>
                    @empty

                    @endforelse
            </div>
        </div>
    @empty
    <div style="justify-content:center;">
        <p  class="text-muted ">There is no comment available!!</p>
    </div>
        @endforelse
        <hr>
    </div>
    <br>
    <br>
    <br>
    <br>
    <section class="container" id="comments">
        <h4>Leave Your Comment</h4>
        <form action={{route('create.comment', $blog->id)}} method="post">
            @csrf
            <input type="hidden" name="blog_id"  value="{{$blog->id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <input type="hidden" name="comment_id"  class="form-control" id="comment_id">
            <div class="mb-3">
              <textarea style="height:180px;" type="text" name="user_comment" class="form-control" id="exampleInputPassword1"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Comment</button>
          </form>
    </section> --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
