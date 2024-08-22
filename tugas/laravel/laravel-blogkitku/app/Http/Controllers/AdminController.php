<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function updateRole(Request $request, $userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->role = $request->input('role'); // Atur peran sesuai input
            $user->save();
        }

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
}
