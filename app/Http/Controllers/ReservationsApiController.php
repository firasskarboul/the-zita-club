<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsApiController extends Controller
{
    public function index() {
        return Reservation::all();
    }

    public function store() {
        request()->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'broughtBy' => 'required',
            'payment' => 'required',
        ]);
    
        return Reservation::create([
            'fullName' => request('fullName'),
            'email' => request('email'),
            'phoneNumber' => request('phoneNumber'),
            'broughtBy' => request('broughtBy'),
            'payment' => request('payment'),
        ]);
    }

    public function show($reservationCode) {
        return Reservation::where('reservationCode', $reservationCode)->get();
    }

    public function update(Reservation $reservation) {
        request()->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'broughtBy' => 'required',
            'payment' => 'required',
        ]);
    
        return $reservation->update([
            'fullName' => request('fullName'),
            'email' => request('email'),
            'phoneNumber' => request('phoneNumber'),
            'broughtBy' => request('broughtBy'),
            'payment' => request('payment'),
        ]);
    }

    public function destroy(Reservation $reservation) {
        $success = $reservation->delete();

        return [
            'success' => $success
        ];
    }
}
