@component('mail::message')
Hello {{ $job_provider->CompanyTitle }},<br>
I hope you are fine,{{ $job_seeker->name }} is an {{ $job_seeker->degree }}.<br>
He got in your test {{ $result->total_points}}<br>
If you are interested please free to contact him/her: {{ $job_seeker->email }}.<br>
@if(Storage::disk('cv')->exists($job_seeker->CV))
    Please Find attached his cv.<br>
    <a href="http://127.0.0.1:8000/downloadCV/{{ $job_seeker->CV }}">Downlad CV</a>
@endif
<br>
@if(Storage::disk('cl')->exists($job_seeker->CoverLetter))
    Please Find attached his covr letter.<br>
    <a href="http://127.0.0.1:8000/downloadCV/{{ $job_seeker->CoverLetter }}">Downlad Cover Letter</a>
@endif
Best Regards,<br>
{{ config('app.name') }}
@endcomponent
