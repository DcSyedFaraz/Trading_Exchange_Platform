    <form method="POST" action="{{ route('newsletter.subscribe') }}" class="max-w-md mx-auto mt-10">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2">Subscribe</button>
        @if(session('status'))
            <p class="mt-2 text-green-600">{{ session('status') }}</p>
        @endif
        @error('email')
            <p class="mt-2 text-red-600">{{ $message }}</p>
        @enderror
    </form>
