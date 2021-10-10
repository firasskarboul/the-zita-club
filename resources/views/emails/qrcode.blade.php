@component('mail::message')
<center><b style="font-size:200%; color: #EDA421;">Réservation FALLING LEAVES</b></center> <br/>

Hi <b>{{ $reservation->fullName }}</b>, <br/>

Votre réservation a été enregistrée avec succée, nous vous rappellerons bientôt sur votre numéro: <b>{{ $reservation->phoneNumber }}</b>. <br/>

Votre code de réservation est :

# {{ $reservation->reservationCode }}

Veuillez montrer ce code lors du paiement. <br/>
Vous trouverez tous nos actualités sur Instagram:

@component('mail::button', ['url' => 'https://www.instagram.com/the_zita_club/'])
INSTAGRAM
@endcomponent

Cheers,<br>
Taher Goum.
{{-- {{ config('app.name') }} --}}
@endcomponent
