@component('mail::message')
# Introduction

Hi {{ $email}}

You are receiving this email because you agreed to receive newsletters from our blog.We post daily to keep you updated of trending issues in politics, entertainment, places to visit and technology.

Want your article published to our site today? Reach us through :- 

<p>Email address: <span><strong>ouremails@gmail.com</strong></span></p>

OR 

<p>You can even contact us through: 0709219294</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent