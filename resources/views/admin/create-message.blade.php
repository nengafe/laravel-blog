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
                <form class="form-horizontal " method="post" action="{{ route('chats.store') }}"
                    enctype="multipart/form-data">
                 {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Message title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Message Recipient</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="recipient" value="{{ old('recipient') }}">
                            @error('recipient')
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
                        <label for="" class="col-lg-2"></label>
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">SEND NOW</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection