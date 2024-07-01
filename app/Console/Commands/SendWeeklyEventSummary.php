<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Events; // Zorg ervoor dat je het juiste model importeert
use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyEventSummary; // Zorg ervoor dat je deze Mailable hebt aangemaakt

class SendWeeklyEventSummary extends Command
{
    protected $signature = 'events:weekly-event-summary';
    protected $description = 'Stuur een overzicht van alle events voor de komende week naar de beheerder';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Haal alle events op voor de komende week
        $events = Events::whereBetween('date', [now(), now()->addWeek()])->get();
        $this->info('Commando succesvol uitgevoerd!' .$events);


        // Verstuur de e-mail
        Mail::to('beheerder@example.com')->send(new WeeklyEventSummary($events));

        $this->info('Weekly event summary sent successfully!');
    }

}
