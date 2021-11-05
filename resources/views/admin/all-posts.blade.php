@extends('admin.layout')
@section('content')
<div class="row">

  <div class="col-lg-12">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        @if($message = Session::get('post'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Congrats ! </strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if($message = Session::get('postupdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Congrats ! </strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if($message = Session::get('post'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Alert ! </strong> {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <h3 class="page-header"><i class="fa fa-laptop"></i> <a href="{{ route('posts.create') }}">Create new post
            now</a></h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="{{ route('admin')}}">Home</a></li>
          <li><i class="fa fa-laptop"></i>All Posts</li>
        </ol>
      </div>
    </div>

    <section>
      <table class="table table-striped table-advance table-hover table-bordered">
        <tbody>
          <tr>
            <th><i class="icon_profile"></i> Picture</th>
            <th><i class="icon_calendar"></i> Topic published</th>
            <th><i class="icon_mail_alt"></i> Post ID</th>
            <th><i class="icon_pin_alt"></i> Category</th>
            <th><i class="icon_mobile"></i> Date </th>
            <th><i class="icon_mobile"></i> Likes </th>
            <th><i class="icon_mobile"></i> Dislikes </th>
            <th><i class="icon_cogs"></i> Action</th>
          </tr>
          @foreach ($posts as $post)
          <tr>
            <td><img src="{{ asset('storage/posts/'.$post->picture) }}" alt=""
                style="height: 100px;width:120px;border-radius:5px;"></td>
            <td>{{ $post->title}}</td>
            <td>{{ $post->postid}}</td>
            <td>{{ $post->category }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->likes }}</td>
            <td>{{ $post->dislikes }}</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-primary" href="{{ route('posts.show', $post->id) }}"
                  title="click here to edit,view"><i class="icon_plus_alt2"></i></a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                  @csrf
                  {{ method_field('DELETE')}}
                  <button class="btn btn-danger" title="Delete this post?"><i class="icon_close_alt2"></i></button>
                </form>

              </div>
            </td>
          </tr>
          @endforeach



        </tbody>
      </table>
    </section>
  </div>
</div>
@endsection