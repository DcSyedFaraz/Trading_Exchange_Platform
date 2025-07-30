<?php

namespace App\Services;

use App\Jobs\SendCampaignEmail;
use App\Models\Campaign;

class CampaignMailer
{
    public function send(Campaign $campaign)
    {
        $campaign->load('subscribers');
        foreach ($campaign->subscribers as $subscriber) {
            SendCampaignEmail::dispatch($campaign, $subscriber->email, $subscriber->pivot->id);
        }

        $campaign->update(['status' => 'sent']);
    }
}
