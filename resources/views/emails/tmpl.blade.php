@component('mail::message')

<img width="500" src="https://newrelic.com/assets/pages/apm/php/php-elephant-logo-bd4f9d83be8c8563248fe4793f90bae7.png">
<br>

<h2 style="color: red">({{ $email }}) {{ $user }}</h2>
<p style="color: #333;">{{ $msg }}</p>
Thanks,<br>
{{ config('app.name') }}

@endcomponent