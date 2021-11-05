@extends('admin.layout')
@section('content')
<section class="panel">
  <header class="panel-heading">
    All Users
  </header>

  <table class="table table-striped table-advance table-bordered table-hover">
    <tbody>
      <tr>
        <th><i class="icon_profile"></i> Picture</th>
        <th><i class="icon_calendar"></i> Full names</th>
        <th><i class="icon_mail_alt"></i>Email address</th>
        <th><i class="icon_mail_alt"></i>Phone number</th>
        <th><i class="icon_pin_alt"></i> Date subscribed</th> 
      </tr>
      
      @foreach($users as $user)
      <tr>
        <td><img src="{{ asset('storage/profiles/'.$user->picture) }}" style="height: 60px;width:80px;border-radius:50%;" alt=""></td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email_address }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->created_at }}</td> 
      </tr> 
      @endforeach
    </tbody>
  </table>
</section> 
@endsection