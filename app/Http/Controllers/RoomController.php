<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatUser;
use App\Models\Room;
use Illuminate\Support\Str;

use PhpMqtt\Client\Facades\MQTT;



class RoomController extends Controller
{
    public function index()
    {
        return view('room');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nickname' => ['required', 'unique:chat_users,nickname', 'min:3', 'max:255'],
            'room_name' => ['required', 'unique:rooms,name', 'min:3', 'max:255']
        ]);

        $chat_user = ChatUser::create([
            'nickname' => $request->nickname,
            'status' => 'online',
            'last_login' => now(),
            'expired_at' => now()->addDays(3),
        ]);

        $added_slug = '';
        $slug = '';
        do {

            $slug = Str::slug($request->room_name . $added_slug);
            $has_slug = Room::where('slug', $slug)->count() > 0;
            $added_slug = ' ' . Str::random(5);

        } while ($has_slug);

        $room = Room::create([
            'slug' => $slug,
            'name' => $request->room_name,
            'member_count' => 1,
            'status' => 'active',
            'created_by' => $chat_user->id
        ]);

        session()->put('chat_user_data', $chat_user);
        session()->put('room_data', $room);

        return [
            'success' => true
        ];
    }
}
