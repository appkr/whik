<?php

Route::get('pub', function () {
    $data = [
        'event' => 'App\\Events\\NewUserCreated',
        'data' => factory(App\User::class)->make()->toArray(),
    ];

    Redis::publish('whik', json_encode($data));

    return response()->json($data, 200, [], JSON_PRETTY_PRINT);
});

Route::get('sub', function () {
    return view('welcome');
});
