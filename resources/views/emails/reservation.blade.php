@component('mail::message')
<center><b style="font-size:200%; color: #EDA421;">Ticket: THE FALLING LEAVES</b></center> <br/>

Hi <b>{{ $reservation->fullName }}</b>, <br/>

Votre ticket a été payée avec succée. <br/>

CODE QR :
{{ QrCode::size(250)->format('png')->generate($order->orderCode, $QRpath); }}
![Image_Alter_Text]({{$qrImagePath}})

Veuillez montrer cette <b>Ticket</b> avec le <b>CODE QR</b> à l'entrée. <br/>
Vous trouverez tous nos actualités sur Instagram:

@component('mail::button', ['url' => 'https://www.instagram.com/the_zita_club/'])
INSTAGRAM
@endcomponent

Cheers,<br>
Taher Goum.
{{-- {{ config('app.name') }} --}}
@endcomponent
