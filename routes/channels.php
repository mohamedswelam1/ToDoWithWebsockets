<?php


/*
|--------------------------------------------------------------------------
use Illuminate\Support\Facades\Broadcast;
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('public.previewtask.1',function(){
    return [
        "title" => $this->title,
        "desc" => $this->desc,
        "status" => $this->status,
        'message'=> $this->message
    ];
});