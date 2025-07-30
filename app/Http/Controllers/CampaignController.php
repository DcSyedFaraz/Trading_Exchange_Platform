<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Subscriber;
use App\Services\CampaignMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->paginate(10);

        return view('campaign.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaign.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required',
            'body' => 'required',
            'send_at' => 'nullable|date',
        ]);

        $campaign = Campaign::create($data + ['status' => $request->send_at ? 'scheduled' : 'draft']);

        if ($request->send_at === null && $request->has('send_now')) {
            $mailer = new CampaignMailer;
            $campaign->subscribers()->sync(Subscriber::whereNotNull('confirmed_at')->pluck('id'));
            $mailer->send($campaign);
        }

        return redirect()->route('campaign.index')->with('status', 'Campaign saved.');
    }

    public function send(Campaign $campaign, CampaignMailer $mailer)
    {
        $campaign->subscribers()->sync(Subscriber::whereNotNull('confirmed_at')->pluck('id'));
        $mailer->send($campaign);

        return redirect()->route('campaign.index')->with('status', 'Campaign sent.');
    }

    public function open($pivotId)
    {
        DB::table('campaign_subscriber')->where('id', $pivotId)->update(['opened_at' => now()]);
        Log::info('sdasd' . $pivotId);
        $pixel = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMBgR2F2NIAAAAASUVORK5CYII=');
        return response($pixel)->header('Content-Type', 'image/png');
    }

    public function click($pivotId)
    {
        DB::table('campaign_subscriber')->where('id', $pivotId)->update(['clicked_at' => now()]);

        return redirect('/');
    }

    public function analytics()
    {
        $campaigns = Campaign::withCount([
            'subscribers as sent_count' => fn($q) => $q->whereNotNull('campaign_subscriber.sent_at'),
            'subscribers as open_count' => fn($q) => $q->whereNotNull('campaign_subscriber.opened_at'),
            'subscribers as click_count' => fn($q) => $q->whereNotNull('campaign_subscriber.clicked_at'),
        ])->get();

        return view('campaign.analytics', compact('campaigns'));
    }
}
