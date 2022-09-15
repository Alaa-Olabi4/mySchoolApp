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

        //check password
        if(!$user || !Hash::check($request->password , $user->password) ){

            $message = 'Bad request !';

            return redirect()->route('login')->with('message',$message);
        }

        $token = $user->createToken('mySchoolApplicationToken')->plainTextToken;

        return redirect()->route('home',$token);
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
        }else{
            return response()->json(['message'=>'Bad request']);
        }
    }
}
