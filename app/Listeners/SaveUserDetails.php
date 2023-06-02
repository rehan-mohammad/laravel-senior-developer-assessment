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

        $existingFullname = Detail::where('key', 'Full name')->where('user_id', $user->id)->first();
        if (isset($existingFullname)) {
            $existingFullname->value = $fullName;
            $existingFullname->save();
        } else {
            Detail::create([
                'key' => 'Full name',
                'value' => $fullName,
                'type' => 'bio',
                'user_id' => $user->id,
            ]);
        }

        // Save middle initial
        $middleInitial = strtoupper(substr($user->middlename, 0, 1));

        $existingMiddleInitial = Detail::where('key', 'Middle Initial')->where('user_id', $user->id)->first();
        if (isset($existingMiddleInitial)) {
            $existingMiddleInitial->value = $middleInitial;
            $existingMiddleInitial->save();
        } else {
            Detail::create([
                'key' => 'Middle Initial',
                'value' => $middleInitial . '.',
                'type' => 'bio',
                'user_id' => $user->id,
            ]);
        }

        // Save avatar
        $avatar = $user->photo;

        $existingAvatar = Detail::where('key', 'Avatar')->where('user_id', $user->id)->first();
        if (isset($existingAvatar)) {
            $existingAvatar->value = $avatar;
            $existingAvatar->save();
        } else {
            Detail::create([
                'key' => 'Avatar',
                'value' => $avatar,
                'type' => 'bio',
                'user_id' => $user->id,
            ]);
        }

        // Save gender
        $gender = $user->prefixname === 'Mr' ? 'Male' : 'Female';

        $existingGender = Detail::where('key', 'Gender')->where('user_id', $user->id)->first();
        if (isset($existingGender)) {
            $existingGender->value = $gender;
            $existingGender->save();
        } else {
            Detail::create([
                'key' => 'Gender',
                'value' => $gender,
                'type' => 'bio',
                'user_id' => $user->id,
            ]);
        }
    }
}
