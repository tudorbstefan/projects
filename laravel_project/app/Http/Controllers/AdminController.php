<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Redirect;
use Session;
use App\User;
use Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request -> isMethod('post'))
        {
            $data = $request -> input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1']))
            {
               return redirect::action('AdminController@dashboard');
            } else {
                return redirect('/admin') -> with('flash_message_error', 'Ați introdus greșit Utilizator sau Parola!');
            }
        }
        return view('admin.admin_login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function check_pwd(Request $request) 
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
        if(Hash::check($current_password,$check_password->password))
        {
            echo "true"; die;
        } else {
            echo "false"; die;
        }
    }

    public function update_pwd(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password))
            {
                $password = bcrypt($data['new_pwd']);
                User::where('email',Auth::user()->email)->update(['password' => $password]);
                return redirect('/admin/settings')->with('flash_message_success','Parola s-a actualizat cu success!');
            } else {
                return redirect('/admin/settings')->with('flash_message_error','Parola nu s-a putut actualiza!');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin') -> with('flash_message_success', 'Logout realizat cu success!');
    }
}
