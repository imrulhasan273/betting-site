<?php

namespace App\Http\Controllers;

use App\Club;
use App\Role;
use App\User;
use App\Widthdraw;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ClubController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function add()
    {
        return view('dashboard.clubs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,except,id',
            'user_name' => ['required', 'unique:users'],
            'password' => 'required',
            'passwordConfirm' => 'required'
        ]);

        if ($request->password == $request->passwordConfirm) {

            $NewClub = Club::create([
                'name' => $request->club_name,
                'balance' => 0,
                'member' => null,
                'commission' => $request->club_commission
            ]);

            #Club Admin
            $club = Club::where('id', $NewClub->id)->first();   //added
            $role = Role::where('name', 'club_admin')->first();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_name' => $request->user_name,
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ]);
            $user->role()->attach($role->id);
            $user->clubOwner()->attach($club->id);    //added

            return Redirect::route('admin.clubs')->with('message', 'Club-User Added!');
        }

        return Redirect::route('admin.clubs')->with('error', 'Club-User Not Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        $this->authorize('edit', $club);

        // dd($club);
        return view('dashboard.clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        // dd($request);

        $updatingClub = Club::where('id', $request->id)->first();
        if ($updatingClub) {
            $updatingClub->update([
                'name' => $request->name,
                'commission' => $request->commission,
                'is_active' => $request->is_active,
            ]);
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Club Info is not Updated!';
        if ($updatingClub) {
            $msg1 = 'message';
            $msg2 = 'Club Info Updated!';
        }

        return Redirect::route('admin.clubs')->with($msg1, $msg2);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club, User $user)
    {
        $this->authorize('delete', $club);

        $deleteClub = DB::table('clubs')->where('id', $club->id)->delete();
        $deleteUser = DB::table('users')->where('id', $user->id)->delete();
        if ($deleteClub && $deleteUser) {
            return back()->with('message', 'Club and User have been Deleted!');
        }

        return back()->with('error', 'Club and User have not been Deleted!');
    }

    public function clubsWithdrawList()
    {
        $widthdraws = Widthdraw::where('user_role', 'club_admin')->get();
        return view('dashboard.clubs.withdraw_list', compact('widthdraws'));
    }

    public function clubsWithdrawRequest()
    {
        return view('dashboard.clubs.withdraw_request');
    }

    public function WidthDrawPlace(Request $request)
    {
        $userId = Auth::user()->id;

        $method = $request->method;
        $type = $request->type;
        $to = $request->to;
        $amount =  $request->amount;
        $note =  $request->note;

        $user = User::where('id', $userId)->get();
        $clubID = $user[0]->clubOwner[0]->id;


        $CurrentBalance = Club::where('id', $clubID)->pluck('balance');
        $CurrentBalance = $CurrentBalance[0];

        $LockBalance = Club::where('id', $clubID)->pluck('lock_balance');
        $LockBalance = $LockBalance[0];

        if ($CurrentBalance < $amount) {
            return Redirect::route('admin.clubs.withdraw.list')->with('error', 'Insuffient Balance');
        }

        $InsertWidthdraw = false;

        if (is_numeric($amount)) {

            $userRole = Auth::user()->role[0]->name;

            $InsertWidthdraw = Widthdraw::create([
                'user_id' =>  $userId,
                'user_role' => $userRole,
                'method' => $method,
                'method_type' => $type,
                'amount' => $amount,
                'widthdraw_to' => $to,
                'note' => $note,
                'status' => 'pending'
            ]);

            # MOVE WIDTHDRAW AMOUNT TO LOCK BALANCE
            $creditsToLockCredits = Club::where('id', $clubID)->first();
            if ($creditsToLockCredits) {
                $creditsToLockCredits->update([
                    'balance' => $CurrentBalance - $amount,
                    'lock_balance' => $LockBalance + $amount
                ]);
            }
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Widthdraw Request is Unsuccessfull!';
        if ($InsertWidthdraw) {
            $msg1 = 'message';
            $msg2 = 'Widthdraw Request Successfull!';
        }

        return Redirect::route('admin.clubs.withdraw.list')->with($msg1, $msg2);
    }

    public function statusChangeByClub(Widthdraw $widthdraw, $code)
    {
        $flag = Widthdraw::where('id', $widthdraw->id)->pluck('status');
        $flag = $flag[0];

        if ($flag == 'paid') {
            return back()->with('error', 'Already Paid');
        } else if ($flag == 'cancel') {
            return back()->with('error', 'Already Cancelled');
        }

        if ($code == 0) {
            # CHANGE STATUS TO CANCEL
            $updatingWidthdraw = Widthdraw::where('id', $widthdraw->id)->first();
            if ($updatingWidthdraw) {
                $updatingWidthdraw->update([
                    'status' => 'cancel'
                ]);
            }

            $user = User::where('id', $widthdraw->user_id)->get();
            $clubID = $user[0]->clubOwner[0]->id;

            $CurrentBalance = Club::where('id', $clubID)->pluck('balance');
            $CurrentBalance = $CurrentBalance[0];

            $LockBalance = Club::where('id', $clubID)->pluck('lock_balance');
            $LockBalance = $LockBalance[0];

            # MOVE WIDTHDRAW AMOUNT TO MAIN BALANCE
            $creditsToLockCredits = Club::where('id', $clubID)->first();
            if ($creditsToLockCredits) {
                $creditsToLockCredits->update([
                    'balance' => $CurrentBalance + $widthdraw->amount,
                    'lock_balance' => $LockBalance - $widthdraw->amount
                ]);
            }
        }

        return back()->with('message', 'Widthdraw Cancelled!!');
    }

    public function ClubWidthdraw()
    {
        $widthdraws = Widthdraw::where('user_role', 'club_admin')->get();
        return view('dashboard.clubs_widthdraws', compact('widthdraws'));
    }

    public function WidthdrawStatus(Widthdraw $widthdraw, $code)
    {
        # CHECK IF ALREADY PAID OR CANCELLED
        $flag = Widthdraw::where('id', $widthdraw->id)->pluck('status');
        $flag  = $flag[0] ?? null;

        if ($flag == 'paid') {
            return back()->with('error', 'Already Paid');
        } else if ($flag == 'cancel') {
            return back()->with('error', 'Already Cancelled');
        }

        # SET VARIABLE STATE TO THE STATUS THAT I WILL SET
        $state = null;
        if ($code == 1) {
            $state = 'paid';
        } else if ($code == 0) {
            $state = 'cancel';
        }

        if ($state == 'paid') {

            # CHANGE STATUS TO CANCEL
            $updatingWidthdraw = Widthdraw::where('id', $widthdraw->id)->first();
            if ($updatingWidthdraw) {
                $updatingWidthdraw->update([
                    'status' => 'paid'
                ]);
            }

            # UPDATE LOCK CREDIT OF CLUB (SUBSTRACT LOCK BALANCE)
            $user = User::where('id', $widthdraw->user_id)->get();
            $clubID = $user[0]->clubOwner[0]->id;

            $CurrentBalance = Club::where('id', $clubID)->pluck('balance');
            $CurrentBalance = $CurrentBalance[0];

            $LockBalance = Club::where('id', $clubID)->pluck('lock_balance');
            $LockBalance = $LockBalance[0];

            # MOVE WIDTHDRAW AMOUNT TO MAIN BALANCE
            $creditsToLockCredits = Club::where('id', $clubID)->first();
            if ($creditsToLockCredits) {
                $creditsToLockCredits->update([
                    'lock_balance' => $LockBalance - $widthdraw->amount
                ]);
            }

            # START UPDATE SUPER ADMIN ACCOUNT (ADD)
            $superAdmin = User::whereHas(
                'role',
                function ($q) {
                    $q->where('name', 'super_admin');
                }
            )->get();
            $superAdmin = $superAdmin[0];

            $BANK = User::where('id', $superAdmin->id)->pluck('credits');

            $SuperAdminUser = User::where('id', $superAdmin->id)->first();
            if ($SuperAdminUser) {
                $SuperAdminUser->update([
                    'credits' => $BANK[0] + $widthdraw->amount,
                ]);
            }
            # END UPDATE SUPER ADMIN ACCOUNT (SUBSTRACT)
        } else if ($state == 'cancel') {
            # CHANGE STATUS TO CANCEL
            $updatingWidthdraw = Widthdraw::where('id', $widthdraw->id)->first();
            if ($updatingWidthdraw) {
                $updatingWidthdraw->update([
                    'status' => 'cancel'
                ]);
            }

            # UPDATE LOCK CREDIT OF CLUB (ADD LOCK BALANCE  TO MAIN BALANCE)
            $user = User::where('id', $widthdraw->user_id)->get();
            $clubID = $user[0]->clubOwner[0]->id;

            $CurrentBalance = Club::where('id', $clubID)->pluck('balance');
            $CurrentBalance = $CurrentBalance[0];

            $LockBalance = Club::where('id', $clubID)->pluck('lock_balance');
            $LockBalance = $LockBalance[0];

            # MOVE WIDTHDRAW AMOUNT TO MAIN BALANCE
            $creditsToLockCredits = Club::where('id', $clubID)->first();
            if ($creditsToLockCredits) {
                $creditsToLockCredits->update([
                    'balance' => $CurrentBalance + $widthdraw->amount,
                    'lock_balance' => $LockBalance - $widthdraw->amount
                ]);
            }
        }


        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Widthdraw Request rejected!';
        if ($code == 1) {
            $msg1 = 'message';
            $msg2 = 'Widthdraw Request accepted!';
        } else if ($code == 0) {
            $msg1 = 'error';
            $msg2 = 'Widthdraw Request Cancelled!';
        }

        return back()->with($msg1, $msg2);
    }
}
