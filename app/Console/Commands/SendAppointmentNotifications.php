<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Mail\AppointmentReminder;
use Illuminate\Support\Facades\Mail;

class SendAppointmentNotifications extends Command
{
    /**
     * @var string
     */
    protected $signature = 'appointments:notify';

    /**
     * @var string
     */
    protected $description = 'Query the database for due appointments and send notifications if emails provides';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $appointmentsDueToday = Appointment::whereDate('day', Carbon::today())->get();
        if ($appointmentsDueToday->isNotEmpty()) {
            foreach ($appointmentsDueToday as $appointment) {
                if ($email = $appointment->email) {
                    Mail::to($email)->send(new AppointmentReminder($appointment));
                }
            }
        }
    }
}
