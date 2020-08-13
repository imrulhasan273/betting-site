<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('Profile_Frontend.wallet_partials.profile', compact('user'));
    }
    public function deposit()
    {
        # MODAL
    }
    public function widthdraw()
    {
        # MODAL
    }
    public function bTransfer()
    {
        # MODAL
    }
    public function changeClub()
    {
        # MODAL
    }
    public function changePassword(Request $request)
    {
        $userId = Auth::user()->id;

        $query = DB::table('users')
            ->where('id', '=', $userId)
            ->pluck('password');

        $r = ($request->currentPassword);
        $k = ($r + 0);

        $curPassDB = $query[0];
        $curPassREQ = Hash::make($k);


        if ($curPassDB == $curPassREQ) {
            if ($request->confirmPassword == $request->newPassword) {
                $updatingPassword = User::where('id', $userId);
                if ($updatingPassword) {
                    $updatingPassword->update([
                        'password' => Hash::make($request->confirmPassword),
                    ]);
                }
                $data = "Password Updated";
            } else {
                $data = "Please set new password correctly";
            }
        } else {
            $data = "Incorrect Current Password!";
        }

        $s = [$curPassDB, $curPassREQ];

        return response()->json($s);
    }

    # BLADES
    public function statement()
    {
        return view('Profile_Frontend.statements');
    }

    public function sponsor()
    {
        return view('Profile_Frontend.sponsor');
    }

    public function oneten()
    {
        return view('Profile_Frontend.oneten');
    }
}
