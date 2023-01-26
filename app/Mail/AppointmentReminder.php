<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppointmentReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @return void
     */
    public function __construct(public Appointment $appointment)
    {
    }

    /**
     * @return $this
     */
    public function build()
    {
        return $this->from('info@sharply.com')
                ->subject($this->appointment->type.' Appointment Reminder')
                ->markdown('emails.appointments.remind', [
                    'appointment' => $this->appointment,
                ]);
    }
}
