<?php

namespace App\Listeners;

use App\Events\UserSaved;
use App\Models\Detail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveUserDetails
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserSaved  $event
     * @return void
     */
    public function handle(UserSaved $event)
    {
        $user = $event->user;

        // Save full name
        $fullName = $user->firstname . ' ' . $user->middlename . ' ' . $user->lastname;
        Detail::create([
            'key' => 'Full name',
            'value' => $fullName,
            'type' => 'bio',
            'user_id' => $user->id,
        ]);

        // Save middle initial
        $middleInitial = strtoupper(substr($user->middlename, 0, 1));
        Detail::create([
            'key' => 'Middle Initial',
            'value' => $middleInitial . '.',
            'type' => 'bio',
            'user_id' => $user->id,
        ]);

        // Save avatar
        $avatar = $user->photo;
        Detail::create([
            'key' => 'Avatar',
            'value' => $avatar,
            'type' => 'bio',
            'user_id' => $user->id,
        ]);

        // Save gender
        $gender = $user->prefixname === 'Mr' ? 'Male' : 'Female';
        Detail::create([
            'key' => 'Gender',
            'value' => $gender,
            'type' => 'bio',
            'user_id' => $user->id,
        ]);
    }
}
