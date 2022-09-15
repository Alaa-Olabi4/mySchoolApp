<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }
/**
     * Store a newly created resource in storage.
     *    
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $request->validate([
            'FirstName' => ['required', 'string'],
            'LastName' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if(!$request->has('Kind')){
            $request->merge(['Kind'=>'user']);
        }

        if($user = User::create($request->all())){
            $user->password = hash::make($request->password);

            $user->save();

            $token = $user->createToken('mySchoolApplicationToken')->plainTextToken;

            $content = ['token'=>$token ,'user_id'=> $user->id];

            return $content;
        }
        else{
            return response()->json(['message'=>'wrong']);
        }
    }
    /**
     * Store a newly created resource in storage.
     *    
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function register(Request $request)
    {
        $request->validate([
            'FirstName' => ['required', 'string'],
            'LastName' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if(User::where('email',$request->email)->first()){
            return view('login',['message'=>'this email is exist already !']);
        }

        if(!$request->has('Kind')){
            $request->merge(['Kind'=>'user']);
        }

        if($user = User::create($request->all())){
            $user->password = hash::make($request->password);

            $user->save();

            $token = $user->createToken('mySchoolApplicationToken')->plainTextToken;

            $content = ['token'=>$token ,'user_id'=> $user->id];

            // return $content;

           return view('home',['token'=>$token,'message'=>$user->FirstName]);
        }
        else{
            return response()->json(['message'=>'wrong']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        $user = User::where('id',$id)->first();
        $content = [
            'FirstName' => $user->FirstName,
            'LastName' => $user->LastName,
            'email' => $user->email,
            // 'email_verified_at' => $user->email_verified_at,
            // 'created_at' => $user->created_at,
            // 'updated_at' => $user->updated_at
        ];
        return $content;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, $id)
    {
        $user = User::where('id',$id)->first();

        $user->update($request->all());

        $user->save();

        return $user;
        // return response()->json(['message'=>'user updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function destroy($id)
    {
        $user = User::where('id',$id);
        $user->tokens()->delete();
        $user->delete();
        return response()->json(['message'=> 'Your account deleted successfully!']);
    }

    /**
     * Login the user to app.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        // dd('login');
        $request->validate([
            'email' => ['required','string'],
            'password' => ['required','string','min:8']
        ]);
        //check email
        $user = User::where('email' , $request->email)->first();
        // session(['failure-login'=>'Bad request']);
        // session()->put('failure-login','Bad request');
        //check password
        if(!$user || !Hash::check($request->password , $user->password) ){

            // dd($errors);

            // return response()->json([
            //     'message' => 'Bad request'
            // ], 401);
            
            $message = 'Bad request !';

            // $request->session(['message'=>'Bad request!']);
            // return back()->withErrors(['error1'=>'Invalid login']);
            // return back()->with(['message'=>'Bad request!']);
            // return back()->with($message,'Bad request !');
            // return view('login',compact('message'));
            return redirect()->route('login')->with('message',$message);
            // return view('login',['message'=>'Bad request']);
            // return redirect()->route('login',['message'=>'Bad request!']);
            // return redirect()->route('login');//->with('failure','Bad request');
        }

        $token = $user->createToken('mySchoolApplicationToken')->plainTextToken;
        // return response()->json([
        //     'user' => $user,
        //     'token' => $token
        // ], 201);

        // dd($user->FirstName);

        return view('home',['token'=>$token,'message'=>$user->FirstName]);
        // return redirect()->route('home',[],301,['_token'=>$token,'message'=>$user->FirstName]);
        // return redirect('/home',302,['message'=>$user->FirstName]);
        // return redirect('/home')->with(['token'=>$token,'message'=>$user->FirstName]);
    }

    /**
     * Logout the user from app.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        $auth = Auth::user();
        if($auth){
            $user = User::find($auth->id);
            $user->tokens()->delete();

            return Redirect()->route('login');

            return response()->json([
                'message' => 'Logged out'
            ],200);
            // return redirect('/login');
        }else{
            return response()->json(['message'=>'Bad request']);
        }

    }

}
