<?php

namespace App\Http\Controllers\User;

use App\ECommerce\Shared\Requests\LoginRequest;
use App\ECommerce\User\Services\UserAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct(private UserAuthService $service){ }

    public function index()
    {
        return (Auth::guard('user')->user())
            ? $this->service->index('Admin.master')
            : redirect('/user/signin');
    }

    public function signIn()
    {
        return (Auth::guard('user')->guest())
            ? $this->service->index('Admin.Auth.login')
            : redirect('/user');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = [
            'email' => request()->input('email'),
            'password' => request()->input('password')
        ];

        if (auth()->guard('user')->attempt($credentials)) {
            Auth::guard('user')->login($request->user('user'));
            return redirect(url('/user'));
        } else {
            return redirect()->back()->with('error', 'Sorry invalid data');
        }
    }

    public function signOut()
    {
        Auth::guard('user')->logout();
        return redirect(url('/user'));
    }
}
