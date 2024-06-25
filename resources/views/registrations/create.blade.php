<x-app>
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Create registration</h1>

        <form action="/registration/store" method="POST" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="events_id" class="block text-sm font-medium text-gray-700">Event</label>
                <select name="events_id" id="events_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Select Event</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="user_name" class="block text-sm font-medium text-gray-700">User Name</label>
                <input type="text" name="user_name" id="user_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">Create</button>
        </form>

        <a href="/registrations" class="block mt-4 text-blue-500 hover:underline">Back</a>
    </div>
</x-app>
