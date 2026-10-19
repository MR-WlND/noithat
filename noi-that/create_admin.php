<?php
$user = App\Models\User::updateOrCreate(
    ['email' => 'admin@noithat.com'],
    [
        'name' => 'Administrator',
        'password' => Hash::make('123456')
    ]
);
echo "Admin account ready";
