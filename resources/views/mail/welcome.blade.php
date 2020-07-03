@component('mail::message')
    # Welcome {{ $user->name }}!

    Thank you for registering for our services.

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
