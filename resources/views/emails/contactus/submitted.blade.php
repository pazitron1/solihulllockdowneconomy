@component('mail::message')
# A new enquiry has been submitted

<b>Name:</b> {{$enquiry->name}} <br>
<b>Email:</b> {{$enquiry->email}} <br>
<b>Message:</b> {{$enquiry->message}} <br>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
