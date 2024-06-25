<?php

namespace App\Http\Controllers;

use App\Models\registrations;
use Illuminate\Http\Request;
use App\Models\events;

class EventController extends Controller
{
    public function index()
    {
        $events = events::all();
        return view('events.index', ['events' => $events]);

    }

    public function create(Request $request)
    {
        return view('events.create');
    }

    public function store()
    {
        try {
            $data = request()->validate([
                'name' => 'required',
                'description' => 'required',
                'location' => 'required',
                'date' => 'required',
            ]);

            events::create($data);

            return redirect('/events')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'there was an error creating the event. Please try again.']);
        }
    }

    public function edit(events $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, events $event)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'location' => 'required',
                'date' => 'required',
            ]);

            $event->update($data);

            return redirect('/events')->with('success', 'Event updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'there was an error updating the event. Please try again.']);
        }
    }

    public function destroy(events $event)
    {
        try {
            $event->delete();

            return redirect('/events')->with('success', 'Event deleted successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Er is een fout opgetreden bij het verwijderen van het evenement. Probeer het opnieuw.']);
        }
    }
}
