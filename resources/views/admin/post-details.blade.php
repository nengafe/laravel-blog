@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> <a href="{{ route('posts.edit', $post->id) }}">click here to edit this post</a></h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('admin')}}">Home</a></li>
                <li><i class="fa fa-laptop"></i>Post/ Article details</li>
              </ol>
            </div>
          </div>
        <section class="panel">
            <header class="panel-heading">
                Post details
            </header>
            <div class="panel-body">
                <form class="form-horizontal " method="post" action="{{ route('posts.store') }}"
                    enctype="multipart/form-data">
                 {{ csrf_field() }}
                 <div class="form-group">
                    <label class="col-sm-2 control-label">Post</label>
                    <div class="col-sm-10">
                        <img src="{{ asset('storage/posts/'.$post->picture) }}" alt="" class="img-fluid" style="max-height: 50vh">
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Article title</label>
                        <div class="col-sm-10">
                            {{ $post->title}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            {{ $post->category }}
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        
                        <div class="col-lg-10">
                            {!!html_entity_decode($post->description)!!}
                        </div>
                    </div>

                    <div class="form-group">
                         <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                            <p class="form-control-static"> Written by <span class="text-danger"><b>{{ $post->publisher }}</b></span>, Published on <span class="text-danger"><b>{{ $post->created_at }}</b></span>, Last update was done on  <span class="text-danger"><b>{{ $post->updated_at }}</b></span></p>
                        </div>
                    </div>
                     
                </form>
            </div>
        </section>
    </div>
</div>
@endsection