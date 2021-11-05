@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> <a href="{{ route('posts.index') }}">Return to all posts</a></h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('admin')}}">Home</a></li>
                <li><i class="fa fa-laptop"></i>New post</li>
              </ol>
            </div>
          </div>
        <section class="panel">
            <header class="panel-heading">
                edit post details 
            </header>
            <div class="panel-body">
                <form class="form-horizontal " method="post" action="{{ route('posts.update', $post->id) }}"
                    enctype="multipart/form-data">
                 {{ csrf_field() }}
                 {{ method_field('PATCH')}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Article title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="{{ $post->title}}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                             
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="" name="category">
                                <option value="">select</option>
                                <option value="Politics">Politics</option>
                                <option value=""></option>
                            </select>
                            @error('category')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" id="focusedInput" type="file" value="{{ old('image') }}">
                            <small class="text-muted">Select the image/picture of your article</small>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $post->description }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Written by</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{ $post->publisher }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2"></label>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">UPDATE ARTICLE DETAILS</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection