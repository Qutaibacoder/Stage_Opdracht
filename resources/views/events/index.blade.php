<x-app>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Events</h1>
        <ul>
            @foreach($events as $event)
                <li class="flex items-center justify-between bg-gray-100 rounded-lg p-4 mb-2">
                    <a class="text-blue-500 hover:underline">{{ $event->name }}</a>
                    <div class="space-x-2">
                        <a href="/events/{{ $event->id }}/edit" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                        <a href="/events/{{ $event->id }}/delete" class="text-red-500 hover:text-red-700">Delete</a>
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="/events/create" class="block mt-4 text-blue-500 hover:underline">Create Event</a>
    </div>
</x-app>
