<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $hotels = DB::table('hotel')
            ->select('hotel.*')
            ->addSelect(DB::raw('(SELECT MIN(harga) FROM kamar WHERE kamar.id_hotel = hotel.id) as min_price'))
            ->orderBy('min_price')
            ->limit(12)
            ->get();

        return view('welcome', compact('hotels'));
    }

    public function showRooms($id)
    {
        $hotel = DB::table('hotel')->where('id', $id)->first();

        if (!$hotel) {
            abort(404);
        }

        $rooms = DB::table('kamar')
            ->where('id_hotel', $id)
            ->orderBy('harga')
            ->get();

        return view('hotel_rooms', compact('hotel', 'rooms'));
    }

    // Keep the existing getRooms method for API if needed
    public function getRooms($id)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $hotel = DB::table('hotel')->where('id', $id)->first();

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found'
            ], 404);
        }

        $rooms = DB::table('kamar')
            ->where('id_hotel', $id)
            ->orderBy('harga')
            ->get();

        return response()->json([
            'success' => true,
            'hotel' => [
                'id' => $hotel->id,
                'nama_hotel' => $hotel->nama_hotel,
                'kamar' => $rooms
            ]
        ]);
    }
}
