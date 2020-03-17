@component('mail::message')
# Welcome to Bedroom Inc.

A place where you are free to share your thoughts and bed things as images with your followers and subscribers.

Please follow the link below to confirm your email address and complete the registration process.

@component('mail::button', ['url' => ''])
Complete Registration
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
