@component('mail::message')
# That's wonderful!

Hi {{$recommendation->name}},<br>

Thank so much for your recommendation. We'll review it and add to the business directory as soon as possible. <br>

Thanks again for helping your local business! <br>
@component('mail::button', ['url' => '/businesses'])
Browse all listings
@endcomponent

Stay safe, stay local,<br>
{{ config('app.name') }}
@endcomponent
