<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

use App\Models\User;
use App\Models\post;



class AuthUser extends Controller
{
    //
    function index(Request $request)
    {
         $data = $request->session()->get('mess');
         return view('./login')->with('mess', $data);
    }


    function register(Request $request)
    {

         $data = $request->session()->get('mess');
         return view('./register')->with('mess', $data);
    }

    function login(Request $request)
    {
       

         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
         ]);
            
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            session()->put('user',[

                'id'=>Auth::user()->id,
                'first_name'=>Auth::user()->first_name,
                'last_name'=>Auth::user()->first_name,
                'role'=> Auth::user()->role,
            ]
            );
           
            $user = Auth::user();
            if ($user->status == 2) {
                return back()->with('mess', 'User is in waiting stage');
            }
            if ($user->status == 0) {
                return back()->with('mess', 'User is in Disable or Rejected ');
            }

            return redirect()->intended('dasboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }







    function auth_register(Request $request)
    {
        $request->validate([
            "email" => "required | email",
            "password" => 'required ',
            "name" => 'required ',
            'cpassword' => 'required | same:password'
        ]);
               
          
             $name = $request->name;
             $name = explode(' ', $name);
             $user = new User();
             $user->email = $request->email;
             $user->password = Hash::make($request->password);
             $user->first_name = $name[0];
             $user->last_name = $name[1] ?? null;
             
        try {

             $user->save();
             return redirect('/register')->with('mess', 'Thank you for applying your application is under review');
        } catch (QueryException $exception) {

            if ($exception->errorInfo[1] == 1062) {
                return redirect('/register')->with('mess', 'Email address is already in use.');
            } else {
                // Handle other types of exceptions or errors
                return redirect('/register')->with('mess', 'An error occurred while processing your request.');
            }

        }



        // print_r($request->all());



    }
    function home()
    {
        return view("home");
    }

    function dashboard()
    {
        // $user_id=session()->get("user")['id'];
        // $user_role=session()->get("user")['role'];
         
        
        

        $user_id = Auth::user()->id;
        $user_role = Auth::user()->role;

        if ($user_role == 'admin') {
            $data = post::all();
            $posts = compact("data", 'user_id', 'user_role');

            return view("dashboard")->with('posts', $posts);
        }

        $data = post::where('user_id', '=', $user_id)->get();


        $posts = compact("data", 'user_id', 'user_role');

        return view("dashboard")->with('posts', $posts);

    }
}

