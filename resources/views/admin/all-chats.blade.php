@extends('admin.layout')
@section('content')
<div class="row">
    
    <div class="col-lg-12">
        <!--overview start-->
        @if($message = Session::get('chatupdate'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congrats ! </strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i> <a href="{{ route('chats.create') }}">Create new message</a></h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ route('admin')}}">Home</a></li>
                <li><i class="fa fa-laptop"></i>All Messages</li>
              </ol>
            </div>
          </div>
   
        <section>
            <table class="table table-striped table-advance table-hover table-bordered">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Sender</th> 
                    <th><i class="icon_mail_alt"></i> Date send</th>
                    <th><i class="icon_pin_alt"></i> Request</th>
                    <th><i class="icon_mobile"></i> Action </th> 
                  </tr>
                  @if($messages->count() == 0)
                    <tr>
                        <td colspan="5"><center>No new request</center></td>
                    </tr>
                @else 
                  @foreach ($messages as $post)
                  <tr>
                     <td>{{ $post->publisher}}</td> 
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->title }}</td> 
                    <td> 
                       <a href="{{ route('chats.edit', $post->id) }}" class="btn btn-primary">send response</a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                  
                  
                </tbody>
              </table>
        </section>
    </div>
</div>
@endsection