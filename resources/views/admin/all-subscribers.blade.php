@extends('admin.layout')
@section('content')
<section class="panel">
  <header class="panel-heading">
    All Users
  </header>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <table class="table table-striped table-advance table-bordered table-hover">
      <tbody>
        <tr>
           <th> #</th>
          <th><i class="icon_mail_alt"></i> Email address</th> 
          <th><i class="icon_pin_alt"></i> Date subscribed</th> 
        </tr>
        
        @foreach($users as $user)
        <tr>
           <td>{{ $user->id}}</td>
          <td>{{ $user->email_address }}</td> 
          <td>{{ $user->created_at }}</td> 
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
</div>
  
</section> 
@endsection