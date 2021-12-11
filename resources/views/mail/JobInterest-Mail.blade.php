@component('mail::message')
Hello {{ $job_provider->CompanyTitle }},<br>
I hope you are fine,{{ $job_seeker->name }} is an {{ $job_seeker->degree }}.<br>
If you are interested please free to contact him/her: {{ $job_seeker->email }}.<br>
Please Find attached his cv.<br>
@if(Storage::disk('cv')->exists($job_seeker->CV))
    <a href="http://127.0.0.1:8000/downloadCV/{{ $job_seeker->CV }}">Downlad CV</a>
@endif
<br>
@if(Storage::disk('cv')->exists($job_seeker->CoverLetter))
    <a href="http://127.0.0.1:8000/downloadCV/{{ $job_seeker->CoverLetter }}">Downlad Cover Letter</a>
@endif
Best Regards,<br>
{{ config('app.name') }}
@endcomponent
