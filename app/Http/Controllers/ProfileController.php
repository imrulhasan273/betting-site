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
    public function bTransfer(Request $request)
    {
        $userId = Auth::user()->id;

        $amount = $request->amount;
        $user_name = $request->user_name;
        $password = $request->password;

        # CHECK IF USER ROLE IS USER
        $CHECKUSER = User::where('user_name', $user_name)->get();
        $CHECKROLE = $CHECKUSER[0]->role[0]->name ?? null;

        if ($CHECKROLE != 'user') {
            return response()->json('User Not Exist');
        }



        # CHECK IF AMOUNT IS NUMERIC
        if (is_numeric($amount)) {
            # CHECK IF PASSWORD IS CORRECT
            $query = DB::table('users')
                ->where('id', '=', $userId)
                ->pluck('password');
            $curPassDB = $query[0];
            $matchPass = Hash::check($password, $curPassDB);

            if ($matchPass) {

                # CHECK IF USER HAVE ENOUGH BALANCE TO TRANSFER
                $CurrentCredits = User::where('id', $userId)->pluck('credits');
                $CurrentCredits = $CurrentCredits[0];

                # IF CREDITS BALANCE IS LESS THAN AMOUNT THEN GO BACK TO MODAL
                if ($CurrentCredits < $amount) {
                    return response()->json('insufficient');
                }

                $isExist = User::where('user_name', $user_name)->first();

                #CHECK IF USER IS EXITS
                if ($isExist) {

                    # ADD TO TARGET ACCOUNT
                    $TarCredits = User::where('user_name', $user_name)->pluck('credits');
                    $TarCredits = $TarCredits[0];

                    $TargetUserUpdate = User::where('user_name', $user_name);
                    if ($TargetUserUpdate) {
                        $TargetUserUpdate->update([
                            'credits' => $TarCredits + $amount,
                        ]);
                    }

                    # SUBSTRACT from MY ACCOUNT
                    $MyCredits = User::where('id', Auth::user()->id)->pluck('credits');
                    $MyCredits = $MyCredits[0];

                    $MyUserUpdate = User::where('id', Auth::user()->id);
                    if ($MyUserUpdate) {
                        $MyUserUpdate->update([
                            'credits' => $MyCredits - $amount,
                        ]);
                    }

                    # ADD INFO TO BALANACE TRANSFER TABLE
                    $AuthuserName = User::where('id', $userId)->pluck('user_name');
                    $AuthuserName = $AuthuserName[0];
                    DB::table('balance_transfer')->insert(
                        [
                            'from' => $AuthuserName,
                            'to' => $user_name,
                            'amount' => $amount,
                            'note' => '',
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                        ]
                    );
                    # END BALANCE TRANSFER HISTORY

                    # ADD TRANSECTION HISTORY FOR SOURCE USER (WHO TRANSFER)
                    $MyCreditsS = User::where('id', Auth::user()->id)->pluck('credits');
                    $MyCreditsS = $MyCreditsS[0];

                    $MyLCreditsS = User::where('id', Auth::user()->id)->pluck('lock_credits');
                    $MyLCreditsS = $MyLCreditsS[0];

                    $user_idT = User::where('user_name', $user_name)->pluck('id');
                    $user_idT = $user_idT[0];
                    DB::table('user_transection')->insert(
                        [
                            'user_id' => $userId,
                            'from_id' => $user_idT,
                            'debit' => $amount,
                            'credit' => 0,
                            'balance' => $MyCreditsS + $MyLCreditsS,
                            'description' => 'Balance Transfer',
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                        ]
                    );

                    # ADD TRANSECTION HISTORY FOR TARGET USER (WHO GET)
                    $MyCreditsT = User::where('user_name', $user_name)->pluck('credits');
                    $MyCreditsT = $MyCreditsT[0];
                    $MyLCreditsT = User::where('user_name', $user_name)->pluck('lock_credits');
                    $MyLCreditsT = $MyLCreditsT[0];
                    DB::table('user_transection')->insert(
                        [
                            'user_id' => $user_idT,
                            'from_id' => $userId,
                            'debit' => 0,
                            'credit' => $amount,
                            'balance' => $MyCreditsT + $MyLCreditsT,
                            'description' => 'Balance Receive',
                            'created_at' =>  \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now(),
                        ]
                    );

                    return response()->json('sent');
                } else {
                    return response()->json('User Not Exist');
                }
            }
            return response()->json('Incorrect Pass');
        }
        return response()->json('incorrect amount');
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
