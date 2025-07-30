<x-app-layout>
    <div class="container mx-auto py-8">
        <form method="POST" action="{{ route('campaign.store') }}" class="max-w-lg">
            @csrf
            <div class="mb-4">
                <label class="block">Subject</label>
                <input type="text" name="subject" class="w-full border p-2" required>
            </div>
            <div class="mb-4">
                <label class="block">Body</label>
                <textarea name="body" class="w-full border p-2" rows="6" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block">Schedule (optional)</label>
                <input type="datetime-local" name="send_at" class="border p-2">
            </div>
            <button type="submit" name="send_now" value="1" class="bg-blue-500 text-white px-4 py-2">Send Now</button>
        </form>
    </div>
</x-app-layout>
