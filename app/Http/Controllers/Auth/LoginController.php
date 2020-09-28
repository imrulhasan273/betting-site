<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::ADMIN;



    # START LOG IN WITH USER_NAME INSTEAD OF EMAIL STEP #1 of #3
    protected $username;
    # END LOG IN WITH USER_NAME INSTEAD OF EMAIL



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        # START LOG IN WITH USER_NAME INSTEAD OF EMAIL STEP #2 of #3
        $this->username = 'user_name';
        # START LOG IN WITH USER_NAME INSTEAD OF EMAIL

    }

    # START LOG IN WITH USER_NAME INSTEAD OF EMAIL STEP #3 of #3
    public function username()
    {
        return $this->username;
    }
    # START LOG IN WITH USER_NAME INSTEAD OF EMAIL


    # ADDED FUNCTION FOR SESSION SAVING ____________________________
    function authenticated(Request $request, $user)
    {
        // $user_ip_address = $request->ip();
        // $data = $request->session()->all();
        // $clientIP = $this->getIp();
        // $data = $request->getClientIp();

        $session = DB::table('sessions')->insert([
            'user_id' => $user->id,
            'ip' =>  $request->getClientIp(),
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
