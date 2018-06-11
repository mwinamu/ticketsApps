<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
 /*   protected $redirectTo = '/home';*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return string
     */

    protected function guard()
    {
        return Auth::guard();
    }

    /*
     * Redirecting to home after user has change the
     * password succesfully. if not succesful
     * wont redirect to
     * home
     * */
    protected function sendResetResponse($response)
    {
        return redirect()->action('TicketsController@view_ticket')
            ->with('message', trans($response));
    }



}
