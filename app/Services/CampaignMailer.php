<?php

namespace App\Services;

use App\Mail\CampaignMail;
use App\Models\Campaign;
use Illuminate\Support\Facades\Mail;

class CampaignMailer
{
    public function send(Campaign $campaign)
    {
        $campaign->load('subscribers');
        foreach ($campaign->subscribers as $subscriber) {
            // dd($subscriber->pivot->id);
            Mail::to($subscriber->email)->send(new CampaignMail($campaign, $subscriber->pivot->id));
            $subscriber->pivot->update(['sent_at' => now()]);
        }

        $campaign->update(['status' => 'sent']);
    }
}
