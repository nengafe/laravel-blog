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
                Create a new post here
            </header>
            <div class="panel-body">
                <form class="form-horizontal " method="post" action="{{ route('posts.store') }}"
                    enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Article title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="help-block">A block of help text that breaks onto a new line and may extend
                                beyond one line.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="" name="category">
                                <option value="">select</option>
                                <option value="Politics">Politics</option>
                                <option value="Travel">Travel</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Technology">Technology</option>
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
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Written by</label>
                        <div class="col-lg-10">
                            <p class="form-control-static">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-lg-2"></label>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">UPLOAD POST NOW</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection