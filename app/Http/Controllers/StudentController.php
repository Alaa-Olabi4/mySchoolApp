<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();
        $users = User::get()->where('Kind','student');

        $content=[];$i=0;

        // dd(['student'=>$students ,'users'=>$users]);

        foreach ($students as $s){
            $su = [
                'id' => $s->id,
                'user_id' => $s->user_id
            ];
            
            $jsoncontent = $users->find($s->user_id);
            $temp = json_decode($jsoncontent,true);
                        
            $s = array_merge($su,$temp);

            $s['id'] = $su['id'];

            $content[$i] = $s;
            $i++;
        }
        // return $content;
        // session()->flush();
        // dd(session()->get('success'));
        return view('student\students',['students'=>$content , 'message'=>'Hi there!' , 'success'=>session()->get('success')]);
    }

    public function create(){
        return view('student.addStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'FirstName' => ['required','string'],
            'LastName' => ['required','string'],
            'email' => ['required','string','unique:users','email'],
            'password' => ['required','string','min:8']
        ]);

        $request->merge([
            'Kind'=>'student',
            'password_confirmation' => $request->password
        ]);


        // session()->put('success','Student added successfully!');        
        // session(['success'=>'Student added successfully!']);
        // $request->session()->flash('success','Student added successfully!');
        // session()->put('success','Student added successfully!');
        // dd("Hi there!");
        // return response()->json(['token'=>$content['token']]);
        // session()->put('success','Student added successfully!');


        $content = UserController::store($request);
        Student::create(['user_id'=>$content['user_id']]);
        return  redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::where('id',$id)->first();

        if(isset($student)){
            $user = UserController::show($student->user_id);
            $su = [
                'id' => $student->id,
                'user_id' => $student->user_id
            ];
            return array_merge($su,$user);
        
        }else{
            return response()->json(['message'=>'Student not found!'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::where('id',$id)->first();

        if(isset($student)){
            UserController::update($request,$student->user_id);
            return response()->json(['message'=>'Student updated successfully!']);
        }else{
            return response()->json(['message'=>'Student not found!'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id',$id)->first();

        if(isset($student)){
            UserController::destroy($student->user_id);
            $student->delete();
            return response()->json(['message'=> 'Student deleted successfully!']);
        }else{
            return response()->json(['message'=>'Student not found!'],404);
        }
    }

}

