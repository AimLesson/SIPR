<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Room;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Event::all();
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('booking.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'id_rooms' => 'required|exists:rooms,id',
            'nama_rooms' => 'required|string|max:255',
            'asalbidang' => 'required|in:Rendal,LITBANG,Ekonomi,PPM,Sekretariat',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'finish' => 'required|date_format:H:i|after:start',
        ]);

        if (!Event::isRoomAvailable($request->id_rooms, $request->start, $request->finish, $request->date)) {
            return back()->withErrors(['msg' => 'Ruangan tidak tersedia di jadwal yang ditentukan']);
        }

        Event::create($request->all());

        return redirect()->route('booking.create')->with('success', 'Ruang berhasil dibooking');
    }

    public function edit(Event $booking)
    {
        $rooms = Room::all();
        return view('booking.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, Event $booking)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'acara' => 'required|string|max:255',
            'id_rooms' => 'required|exists:rooms,id',
            'nama_rooms' => 'required|string|max:255',
            'asalbidang' => 'required|in:Rendal,LITBANG,Ekonomi,PPM,Sekretariat',
            'date' => 'required|date',
            'start' => 'required|date_format:H:i',
            'finish' => 'required|date_format:H:i|after:start',
        ]);

        if (!Event::isRoomAvailable($request->id_rooms, $request->start, $request->finish, $request->date)) {
            return back()->withErrors(['msg' => 'Ruangan tidak tersedia di jadwal yang ditentukan']);
        }

        $booking->update($request->all());

        return redirect()->route('booking.index')->with('success', 'Booking updated successfully');
    }

    public function destroy(Event $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully');
    }

    public function indexroom()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}
