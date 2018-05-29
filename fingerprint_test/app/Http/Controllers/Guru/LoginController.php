<?php

namespace App\Http\Controllers\Guru;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
     use AuthenticatesUsers;
     protected $redirectTo = '/guru';
     protected $username = 'username';

     public function username(){
        return 'username';
    }
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/adminguru');
    }
}
