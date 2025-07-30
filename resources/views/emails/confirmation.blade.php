@component('mail::message')
# Confirm Your Subscription

Please confirm your newsletter subscription by clicking the button below.

@component('mail::button', ['url' => url('/newsletter/confirm/'.$token)])
Confirm
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
