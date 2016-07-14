<?php

Route::get('pub', function () {
    $user = factory(App\User::class)->make()->toArray();
    event(new App\Events\NewUserCreated($user));

    return $user;
});

Route::get('sub', function () {
    return view('welcome');
});
