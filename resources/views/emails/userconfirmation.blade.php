@component('mail::message')
# Registration request sent

Please click below link for confirmation!

@component('mail::button', ['url' => $url])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent