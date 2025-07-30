<?php

namespace App\Jobs;

use App\Mail\CampaignMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Campaign;

class SendCampaignEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Campaign $campaign,
        public string $email,
        public int $pivotId
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(new CampaignMail($this->campaign, $this->pivotId));
        DB::table('campaign_subscriber')->where('id', $this->pivotId)->update(['sent_at' => now()]);
    }
}
