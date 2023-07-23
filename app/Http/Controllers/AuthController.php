<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        /* dd(FacadesHash::make(123456)); */
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('lecturer/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
                
            }
            else if(Auth::user()->user_type == 5)
            {
                return redirect('staff/dashboard');
            }
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['matrixid' => $request->matrixid, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('lecturer/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
                
            }
            else if(Auth::user()->user_type == 5)
            {
                return redirect('staff/dashboard');
            }
            else
            {
                return redirect()->back()->with('error', 'Invalid Matrix ID or Password');
            } 

            
            return redirect('admin/dashboard');

        }
        else
        {
            return redirect()->back()->with('error', 'Invalid Matrix ID or Password');

        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
    
}
