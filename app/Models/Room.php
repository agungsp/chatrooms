<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The users that belong to the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(ChatUser::class, 'room_user', 'room_id', 'user_id');
    }

    public function hasUser($user_id)
    {
        return in_array($user_id, $this->users->pluck('id')->toArray());
    }

    public function addUser($user_id)
    {
        if ($this->hasUser($user_id)) return;

        $user = ChatUser::where('id', $user_id)->firstOrFail();
        $this->users()->attach($user->id);
    }

    public function removeUser($user_id)
    {
        if (!$this->hasUser($user_id)) return;

        $user = ChatUser::where('id', $user_id)->firstOrFail();
        $this->users()->detach($user->id);
    }
}
