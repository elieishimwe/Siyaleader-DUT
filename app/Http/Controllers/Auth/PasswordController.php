<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class PasswordController extends Controller
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
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function postEmail(Request $request)
    {


        $this->validate($request, ['username' => 'required|email']);

        $response = Password::sendResetLink($request->only('username'), function (Message $message) {

            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->subject("Siyaleader Notification - Your Password Reset Link: ");
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['username' => trans($response)]);
        }
    }


    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        return view('auth.reset')->with('token', $token);
    }

      public function postReset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
            'username', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $this->resetPassword($user, $password);
        });

        switch ($response) {
            case Password::PASSWORD_RESET:
                return redirect($this->redirectPath());

            default:
                return redirect()->back()
                            ->withInput($request->only('email'))
                            ->withErrors(['username' => trans($response)]);
        }
    }

     public function getEmailForPasswordReset()
    {
        return $this->username;
    }

}
