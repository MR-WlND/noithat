<?php
$user = App\Models\User::where('email', 'admin@noithat.com')->first();
$user->password = Hash::make('password');
$user->save();
echo "Success";
