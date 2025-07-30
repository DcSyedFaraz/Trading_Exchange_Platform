<x-app-layout>
    <div class="container mx-auto py-8">
        <a href="{{ route('campaign.create') }}" class="bg-blue-500 text-white px-3 py-2">New Campaign</a>
        <table class="mt-4 w-full border">
            <tr class="bg-gray-100">
                <th class="p-2">Subject</th>
                <th class="p-2">Status</th>
                <th class="p-2">Actions</th>
            </tr>
            @foreach($campaigns as $campaign)
                <tr>
                    <td class="p-2">{{ $campaign->subject }}</td>
                    <td class="p-2">{{ $campaign->status }}</td>
                    <td class="p-2">
                        @if($campaign->status !== 'sent')
                            <form method="POST" action="{{ route('campaign.send', $campaign) }}" class="inline">
                                @csrf
                                <button class="text-blue-600">Send Now</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $campaigns->links() }}
    </div>
</x-app-layout>
