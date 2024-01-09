<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getBalance($userId)
    {
        $user = User::findOrFail($userId);
        $balance = $user->investments->sum('expected_balance');
        
        return response()->json(['balance' => $balance]);
    }
}
