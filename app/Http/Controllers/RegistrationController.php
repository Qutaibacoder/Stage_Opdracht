<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Registrations;
use Illuminate\Http\Request;
use App\Jobs\SendConfirmationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class RegistrationController extends Controller
{
    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return $user;

    }
    public function create_event_connection_with_user($user, $event)
    {
        $user->events()->attach($event);
    }
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


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'events_id' => ['required', 'integer'],
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $event = Events::find($request->get('events_id'));
        $test = Registrations::create([
            'events_id' => $event->id,
            'user_name' => $user->name,
            'email' => $user->email,
        ]);
        SendConfirmationEmail::dispatch($user);
        auth()->login($user);
        return redirect('/registrations')->with(['success' => 'Registration successful!']);

    }
    public function showRegistrationForm()
    {
        $events = events::all();
        return view('auth.register', ['events' => $events]);
    }

}
