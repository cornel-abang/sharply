@component('mail::message')
# {{ $appointment->type }} Appointment Reminder

Hi {{ $appointment->name }}

Kindly note that your appointment for <strong>{{ $appointment->type }}</strong> is due today <br>
at <strong>{{ $appointment->helpCentre->name }} - {{ $appointment->helpCentre->address }}</strong>.

Your choosen appointment time is <strong>{{ $appointment->time }}</strong>

Thanks,<br>
Team {{ config('app.name') }} - for FHI360
@endcomponent
