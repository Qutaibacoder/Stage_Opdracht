<x-app>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Registrations</h1>

        <form method="GET" action="{{ route('registrations.index') }}" class="mb-4">
            <label class="block">
                <span class="text-gray-700">Select Event</span>
                <select name="events_id" onchange="this.form.submit()" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Select Event</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ request('events_id') == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                    @endforeach
                </select>
            </label>
        </form>

        <ul>
            @if($registrations->isNotEmpty())
                @foreach($registrations as $registration)
                    <li class="bg-gray-100 rounded-lg p-2 mb-2">
                        <a>{{ $registration->user_name }}</a>
                    </li>
                @endforeach
            @else
                <li class="bg-gray-100 rounded-lg p-2 mb-2">No registrations found for this event.</li>
            @endif
        </ul>
    </div>
    <a href="/register" class="block mt-4 text-blue-500 hover:underline">Create registration</a>
</x-app>
