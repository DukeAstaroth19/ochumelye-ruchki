<?php

namespace App\Http\Controllers;

use App\Models\MasterClass;
use App\Models\Booking;

class BookingController extends Controller
{
    public function book($id)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Для записи необходимо авторизоваться');
        }

        $masterClass = MasterClass::findOrFail($id);

        if (!$masterClass->isAvailable()) {
            return back()->with('error', 'Нет свободных мест на этот мастер-класс');
        }

        $existingBooking = Booking::where('user_id', auth()->id())
            ->where('master_class_id', $id)
            ->first();

        if ($existingBooking) {
            return back()->with('error', 'Вы уже записаны на этот мастер-класс');
        }

        Booking::create([
            'user_id' => auth()->id(),
            'master_class_id' => $id,
            'status' => 'confirmed'
        ]);

        $masterClass->decrement('available_seats');

        return back()->with('success', 'Вы успешно записались на мастер-класс!');
    }

    public function cancel($id)
    {
        $booking = Booking::where('user_id', auth()->id())
            ->where('master_class_id', $id)
            ->firstOrFail();

        $booking->masterClass->increment('available_seats');
        $booking->delete();

        return back()->with('success', 'Запись успешно отменена');
    }
}