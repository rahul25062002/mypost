<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class posts extends Controller
{
    //
        
      
    

    public function index(){
             $data=session()->get('mess');
             return view('post')->with('mess', $data);
    }

    public function handlePost(Request $request){
        
             $request->validate([
                'title'=>'required',
                'discription'=> 'required',
                'feature_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             ]);
             $imageName = time().'.'.$request->feature_img->extension();
             $request->feature_img->move(public_path('images'), $imageName);
             $user_id = Auth::user()->id;
             $post =new post();
             $post->feature_img= $imageName;
             $post->user_id=$user_id;
             $post->title=$request->title;      
             $post->discription=$request->discription;
             $post->save();
             return back()->with('mess','Congrate Your post is created and send to admin approval');
   }
            

    function deletePost($id){  

             post::where('id',$id)->where('user_id', Auth::user()->id)->delete();
             return back()->with('mess','Deleted Post successfully');
    }


    function editPost($id){
              
       
             $post=post::where('id',$id)->where('user_id',Auth::user()->id)->first();
             
             $data=compact('post');
             return view('post')->with('data', $data);
    }
        
        
    function updatePost(Request $request, $id){
             $request->validate([    
             'title'=> 'required',       
             'discription'=> 'required',
             'id'=>'required',]);
             $post=post::where('id',$id)->where('user_id',Auth::user()->id)->first();

             if (!$post) {
                // Handle the case where the post is not found
                return back()->with('mess', 'Post not found.');
            }
             $post->title=$request->title;   
             $post->discription=$request->discription;
             $post->save();
             return redirect('/dasboard')->with('mess','Edit Post');
    }
             
              
    function admin_deletePost($id){
             post::where('id',$id)->delete();
             return back()->with('mess','Deleted Post successfully');
}
       
        
    function admin_editPost($id){
       
             $post=post::where('id',$id)->first();
             $data=compact('post');
             return view('admin_editPost')->with('data', $data);
    }
        
        
        
    function admin_updatePost(Request $request, $id){
             $request->validate([    
             'title'=> 'required',       
             'discription'=> 'required',
             'id'=>'required',]);
             $post=post::where('id',$id)->first();
             $post->title=$request->title;   
             $post->discription=$request->discription;
             $post->save();
             return redirect('/dasboard')->with('mess','Edit Post');
    }




    public function updatestatus(Request $request, $id) {
        $roleCode = auth()->user()->role;
        if ($roleCode === 'admin') {
            $post = Post::find($id);

            if(!$post){
                return back()->with('mess','post not found');
            }
            $Status = $request->status; 

            
            
            // Update the status (assuming it's a circular increment)

            switch ($Status) {
                case "1": $post->status =2; break;
                case "2": $post->status = 3; break;
                case "3": $post->status = 1; break;
            }
            
            $post->save();
            return back();
        } else {
            return back();
        }
       
    }
            
}
              


