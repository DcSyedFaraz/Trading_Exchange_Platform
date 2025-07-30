@component('mail::message')
# {{ $campaign->subject }}

{!! nl2br(e($campaign->body)) !!}

Thanks,
{{ config('app.name') }}
@endcomponent
<img src="{{ route('campaign.open', $pivotId) }}" alt="" width="1" height="1">
