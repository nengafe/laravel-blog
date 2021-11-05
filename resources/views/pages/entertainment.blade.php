@extends('pages.layout')
@section('content')
<div class="container-fluid jumbotron"
    style="padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span>Category</span>
                <h3> Ente</h3>
                <p>This is the travel category</p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @if ($articles->count() == 0)
        <center>No recent uploads for this category</center>
        @else
        @foreach ($articles as $article)
        <div class="col-lg-4 mb-4">
            <div class="entry2">
                <a href="{{ url('article/'.$article->id)}}"><img src="{{ asset('storage/posts/'.$article->picture)}}"
                        alt="Image" style="height: 250px;width:100%;"></a>
                <div class="excerpt">
                    <span class="post-category text-white bg-secondary mb-3">Entertainment</span>
                    <h6><a href="{{ url('article/'.$article->id)}}">{{$article->title}}</a></h6>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image"
                                class="img-fluid" data-pagespeed-url-hash="959252118"
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
@endsection