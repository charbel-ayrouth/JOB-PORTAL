@component('mail::message')
Hello {{ $email_data['name'] }},
To be more secure we hope that you verify your email by clicking the link Below.

<a href="http://127.0.0.1:8000/verify?code={{ $email_data['verificationToken'] }}">http://127.0.0.1:8000/verify</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
