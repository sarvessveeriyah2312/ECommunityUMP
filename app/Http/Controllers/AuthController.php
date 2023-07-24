<?php

namespace App\Http\Controllers;

use Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


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

    public function forgotpassword()
    {
        return view('auth.forgot-password');

    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
         if(!empty($user))
         {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Please check you email for instruction to change your password');

         }
         else
         {
            return redirect()->back()->with('error', 'Email Not Found in the Database.');
         }
      

    }

    public function resetpassword($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            return redirect()->back()->with('error', 'Invalid Token');

        }
     
    }

    public function PostResetPassword($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user-> password = Hash::make($request->password);
            $user->remember_token =  Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', 'Password Changed Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Password Not Match');

        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
    
}
