<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Registrations;
use Illuminate\Http\Request;
use App\mail\EventRegistrationMail;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {
        $eventId = $request->get('events_id');
        $events = Events::all();

        if ($eventId) {
            $registrations = Registrations::where('events_id', $eventId)->get();
        } else {
            $registrations = collect();
        }

        return view('registrations.index', ['registrations' => $registrations, 'events' => $events]);
    }

    public function create()
    {
        $events = Events::all();

        return view('registrations.create', ['events' => $events]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'user_name' => 'required|string|max:255',
                'email' => 'required|email',
                'events_id' => 'required|integer',
            ]);

            // Creëer de registratie
            $registration = Registrations::create($data);

            // Dispatch de job om de bevestigingsmail te versturen
            EventRegistrationMail::dispatch($registration);

            return redirect('/registrations')->with(['success' => 'Registration successful!']);
        } catch (\Exception $e) {
            // Log de fout voor debugging
            \Log::error('Error during registration: ' . $e->getMessage());

            return back()->withErrors(['error' => 'There was an error with your registration. Please try again.']);
        }
    }
}
