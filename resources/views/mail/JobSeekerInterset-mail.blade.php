@component('mail::message')
Hello {{ $job_seeker->name }},<br>
I hope you are fine, we are {{ $job_provider->CompanyTitle }} and we are working in {{ $job_provider->CompanyField }}.
If you are interested to join our team please contact us on our email {{ $job_provider->email }}.<br>
Best Regards,<br>
{{ config('app.name') }}
@endcomponent
