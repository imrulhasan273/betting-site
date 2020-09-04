<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function edit()
    {
        $superAdmin = User::whereHas(
            'role',
            function ($q) {
                $q->where('name', 'super_admin');
            }
        )->get();
        $superAdmin = $superAdmin[0];

        return view('dashboard.index.acc', compact('superAdmin'));
    }

    # SITE BALANCE |
    public function update(Request $request)
    {

        $request->validate([
            'passwordV' => 'required',
            'deposits' => 'numeric|required',
        ]);

        $checkPassValid = Hash::check($request->passwordV, $request->password);

        $updateSITEbalance = false;
        if ($checkPassValid) {

            $updateSITEbalance = User::where('id', $request->id)->first();
            if ($updateSITEbalance) {
                $updateSITEbalance->update([
                    'credits' => $request->credits + $request->deposits,
                ]);
            }
        }

        # CUSTOM ALERT
        $msg1 = 'error';
        $msg2 = 'Transection is not successfull!';
        if ($updateSITEbalance) {
            $msg1 = 'message';
            $msg2 = 'Transection is successfull!';
        }

        return Redirect::route('admin.index')->with($msg1, $msg2);
    }
}
