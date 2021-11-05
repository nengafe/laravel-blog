@component('mail::message')
# Introduction
Hi {{ $email}}
<h4><strong>Title: </strong>{{ $title }}</h4>
{!!html_entity_decode($message)!!}


Thanks,<br>
{{ config('app.name') }}
@endcomponent