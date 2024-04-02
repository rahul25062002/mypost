<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    //

    public function index(){
        
       
        if (auth()->user()->role === 'admin') {
            $users = User::all();
            return view("userData",compact("users"));
        } else {
            return back();
        }
    }

    public function update(Request $request, $id)
    {   
        try {
            // Find the user by id
            $user = User::where("id",$id)->first();
              $Status = $request->status; 

            
            
            // Update the status (assuming it's a circular increment)

            switch ($Status) {
                case "1": $user->status =2; break;
                case "2": $user->status = 3; break;
                case "3": $user->status = 1; break;
            }
            
            
            // Save the changes
            $user->save();
           
            return back()->with('mess', 'User status updated successfully');
        } catch (\Exception $e) {
            
            return back()->with('mess', 'Failed to update user status');
        }
    }


 
}
