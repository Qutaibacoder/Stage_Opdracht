<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class WeeklyEventSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $events;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($events)
    {
        $this->events = $events;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.weekly_events_report')
            ->with([
                'events' => $this->events,
            ]);
     /*   return $this->subject('Weekly Event Summary')
            ->markdown('Mail.WeeklyEventSummary');*/
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Weekly Event Summary',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $date = now()->format('Y-m-d H:i:s');
        $view = 'emails.weekly_events_report';
        $data = ['formattedDate' => $date];

        return new Content($view);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
