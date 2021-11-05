@extends('admin.layout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left">Message</div>
        <div class="widget-icons pull-right">
            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="panel-body">
        <!-- Widget content -->
        <div class="padd sscroll">

            <ul class="chats">

                <!-- Chat by us. Use the class "by-me". -->
                <li class="by-me">
                    <!-- Use the class "pull-left" in avatar -->
                    <div class="avatar pull-left">
                        <img src="img/user.jpg" alt="" />
                    </div>

                    <div class="chat-content">
                        <!-- In meta area, first include "name" and then "time" -->
                        <div class="chat-meta">
                            <h4><b>{{ $chat->publisher }}</b></h4> <span
                                class="pull-right">{{ $chat->created_at}}</span>
                        </div>
                        <h4><strong>{{ $chat->title}}</strong></h4>
                        <br>
                        {!!html_entity_decode($chat->message)!!}
                        <div class="clearfix"></div>
                    </div>
                </li>







            </ul>

        </div>
        <!-- Widget footer -->
        <div class="row">
            <div class="col-lg-12">
                

            </div>
        </div>
    </div>
    <form action="{{ route('chats.update',$chat->id) }}" method="post">
        @csrf
        {{ method_field('PATCH')}}
        <div class="form-group">
            <textarea name="response" id="" cols="30" rows="10" class="form-control"
                 >{{ old('response') }}</textarea>
                 @error('response')
                 <span class="text-danger">{{ $message }}</span>
                
                 @enderror
        </div>
        <button type="submit" class="btn btn-primary">Send response</button>
    </form>

</div>
@endsection