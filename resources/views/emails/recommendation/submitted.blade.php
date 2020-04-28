@component('mail::message')
# New recommendation has been submitted

<b>Name:</b> {{$recommendation->name}} <br>
<b>Email:</b> {{$recommendation->email}} <br>

Wants to recommend: <br>
<b>Business name:</b> {{$recommendation->business_name}} <br>
<b>Business description:</b> {{$recommendation->description}} <br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
