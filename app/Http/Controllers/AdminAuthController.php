<?php

namespace App\Http\Controllers;

use App\User;
use App\Outlet;
use Auth;
use Session;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    public function index() {
        return view('auth.login');
    }

    public function login_auth(Request $request) {

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:4',
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            $role_name = Auth::user()->getRoleNames();
            $role_name = $role_name[0];
            if($role_name == "Super Admin")
            {
                $outlet = Outlet::select('id', 'name', 'outlet_logo')->where('status', 1)->first();
                Session::put('outlet_id', $outlet->id);
            }else{
                $outlets = Auth::user()->outlets;
                if(isset($outlets) && !empty($outlets))
                {
                    $user_outlets = \json_decode($outlets);
                    Session::put('outlet_id', $user_outlets[0]);
                }
            }
           
            return redirect('admin/home');
        }else{
            return back();
        }
    }

    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return redirect('admin/login');
      }
}
