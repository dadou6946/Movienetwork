@component('mail::message')
# Bienvenue sur the Movie Network !

Nous sommes ravis de vous compter parmi nous !

@component('mail::button', ['url' => 'http://127.0.0.1'])
Accéder à Movie Network !
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
