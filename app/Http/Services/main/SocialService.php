<?php

namespace App\Http\Services\main;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SocialService
{

    public function saveSocialDate($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();
        $password = Hash::make('21345678');

        $data = ['email' => $email, 'password' => $password, 'name' => $name];
        
        $u = User::where('email', $email)->first();

        if($u){

            return $u->fill(['name'=>$name]);
        }
        
        return User::create($data);
    }
}