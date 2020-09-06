<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('Profile_Frontend.wallet_partials.profile', compact('user'));
    }
    public function deposit()
    {
        # MODAL //already done on Deposit controller
    }
    public function widthdraw()
    {
        # MODAL //already done in widthdraw controller
    }
    public function bTransfer()
    {
        # MODAL
    }
    public function changeClub(Request $request)
    {
        $userId = Auth::user()->id;

        $query = DB::table('users')
            ->where('id', '=', $userId)
            ->pluck('password');

        $curPassDB = $query[0];

        $matchPass = Hash::check($request->password, $curPassDB);

        $updatingClubName = false;

        if ($matchPass) {
            $updatingClubName = User::where('id', $userId);
            if ($updatingClubName) {
                $updatingClubName->update([
                    'club_id' => $request->clubID,
                ]);
            }

            if ($updatingClubName) {
                return response()->json('success');
            } else {
                return response()->json('failed');
            }
        }
    }
    # -----------------------------USING AJAX -----------------------------
    public function changePassword(Request $request)
    {
        $userId = Auth::user()->id;

        $query = DB::table('users')
            ->where('id', '=', $userId)
            ->pluck('password');

        $curPassDB = $query[0];

        $matchPass = Hash::check($request->currentPassword, $curPassDB);

        if ($matchPass) {
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

        return response()->json($data);
    }

    # FORGET PASSWORD BY USER : CLIENT SIDE
    public function forgetPass(Request $request)
    {
        # $data = $request->email;
        # return response()->json($data);
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
