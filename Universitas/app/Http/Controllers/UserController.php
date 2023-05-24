<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('layout.login');
    }

    public function register(){


        return view('layout.register');
    }

    public function registerPost(Request $request){

       
        $validasi = $request->validate([

            'username' =>'required|regex:/^\S*$/u|min:5',
            'nama' =>'required',
            'email' =>'required|email:dns|unique:user,email',
            'password' =>'required',
           
        ]);
        $validasi['id'] = Str::uuid();
        $validasi['password'] = bcrypt($validasi['password']);
        $user = User::create($validasi);
        Auth::login($user);

       
    
        return redirect()->route('user.login')->with('message',"Silahkan Login Terlebih Dahulu");
    }

    public function loginPost(Request $request){

        $validasi2 = $request->validate([
            'username' =>'required',
            'password' =>'required',
        ]);

        if(Auth::attempt($validasi2)){
            $request->session()->regenerate();
            return redirect()->intended('fakultas');
        }
          return back()->withErrors([
            'username'=>'Invalid username or password'])->onlyInput('username');
                
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }
  
      
}
