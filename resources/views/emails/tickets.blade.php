@component('mail::message')
{{--# {{ $content['title'] }}--}}

{{ $content['body2'] }},<br>
{{ $content['body3'] }}
{{ $content['body4'] }}
{{ $content['body5'] }}
{{ $content['body6'] }}
{{ $content['body7'] }}
{{ $content['body8'] }}
{{--work on url change depending on app url--}}
@component('mail::button', ['url' => 'http://172.16.1.55:100/Ticket'])
{{ $content['button'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
