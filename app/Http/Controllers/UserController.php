<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function login(Request $request){
//        return $request->all();
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|max:255 |email',
            'password' => 'required',
        ]);

        if($validatedData->fails())  {
            return response()->json($validatedData->errors());
        }
        else {
            $user = DB::table('users')->where('email', $request->input('email'))->first();
            //return response()->json($user);
            if ($user && Hash::check($request->input('password'), $user->password)) {
                $api_key = str_random(20);
                DB::table('users')->where('email', $request->input('email'))->update(['api_token' => $api_key]);

                return response()->json(['status' => 200, 'api_key' => $api_key]);
            } else {
                return response()->json(['status' => 'Email or Password didnt match']);
            }
        }
    }
    // lumen query builder
    // get posts
    public function get_posts(){
        $posts = DB::table('posts')->take(5)->get();
        foreach ($posts as $key=>$value){
            $comments = DB::table('comments')->where('user_id', $value->id)->take(2)->get();
            if($comments){
                $posts[$key]->comments_list = $comments;
            }
        }
        return response()->json($posts);
    }
}
