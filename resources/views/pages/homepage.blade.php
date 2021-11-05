@extends('pages.layout')
@section('content')
<style>
    .headers{ 
        background-image: linear-gradient(to right, #3204fdba, #9907facc), url(images/smart.jpeg);
        width: 100%;
        height: 80vh;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat
    }
</style>
<section class="headers"></section>
<div class="container">
    <div class="row align-items-stretch retro-layout-2">
        <div class="col-md-4">
            <a href="" class="h-entry mb-30 v-height gradient" style="background-image: url('images/travel.jpeg');">
                <div class="text">
                    <h2>Travel</h2>

                </div>
            </a>
            <a href="" class="h-entry v-height gradient" style="background-image: url('images/entertainment.jpeg');">
                <div class="text">
                    <h2>Entertainment</h2>

                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="" class="h-entry img-5 h-100 gradient" style="background-image: url('images/politics.jpeg');">
                <div class="text">
                    <h2>Politics</h2>

                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="" class="h-entry mb-30 v-height gradient" style="background-image: url('images/technology.jpeg');">
                <div class="text">
                    <h2>Technology</h2>

                </div>
            </a>
            <a href="" class="h-entry v-height gradient" style="background-image: url('images/lifestyle.jpeg');">
                <div class="text">
                    <h2>Lifestyle</h2>

                </div>
            </a>
        </div>
    </div>
</div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Today Posts</h2>
            </div>
        </div>
        <div class="row">
            @if ($articles->count() == 0)
            <center>No updates Today..navigate the other links to read previously uploaded articles</center>
            @else
            @foreach ($articles as $article)
            <div class="col-lg-4 col-md-4 mb-4">
                <div class="entry2">
                    <a href="{{ url('article/'.$article->id)}}"><img
                            src="{{ asset('storage/posts/'.$article->picture)}}" alt="Image"
                            style="height: 250px;width:100%;"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $article->category }}</span>
                        <h6><a href="{{ url('article/'.$article->id)}}">{{$article->title}}</a></h6>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg"
                                    alt="Image" class="img-fluid" data-pagespeed-url-hash="959252118"
                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ $article->publisher}}</a></span>
                            <span>&nbsp;-&nbsp; {{ $article->created_at}}</span>
                        </div>
                        <p>
                            {{ str_limit(strip_tags($article->description), 150) }}
                            @if (strlen(strip_tags($article->description)) > 150)
                            ... <a href="{{ url('article/'.$article->id) }}" class="btn btn-info btn-sm">Read More</a>
                            @endif
                        </p>

                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>

    </div>

</div>
<div class="site-section bg-lightx">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-5">
                <div class="subscribe-1 ">
                    <h2>Subscribe to our newsletter</h2>
                    <p class="mb-5">Provide us with your email address and have all our latest blogs sent to your email.
                    </p>
                    <form action="{{ url('email-subscribe') }}" class="d-flex" method="POST">
                        @csrf
                        <input type="text" class="form-control" placeholder="Enter your email address"
                            name="email_address">

                        <input type="submit" class="btn btn-primary" value="Subscribe">
                        @error('email_address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection