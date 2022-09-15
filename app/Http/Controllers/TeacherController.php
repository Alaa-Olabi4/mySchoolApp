<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        $users = User::where('Kind','teacher')->get();

        $content=[];$i=0;

        foreach ($teachers as $t){
            $tu = [
                'id' => $t->id,
                'user_id' => $t->user_id,
                'subject' => Subject::find($t->subject_id)->name
            ];

            $jsoncontent = $users->find($t->user_id);
            $temp = json_decode($jsoncontent,true);
            
            $t = array_merge($tu,$temp);

            $t['id'] = $tu['id'];

            $content[$i] = $t;
            $i++;
        }
        return view('teacher.teachers',['teachers'=>$content , 'message'=>'Hi there!']);
    }

    public function create(){
        $subjects = Subject::all();
        return view('teacher.addTeacher',['subjects'=>$subjects]);
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
            'password' => ['required','string'],
            'subject_id' => ['required']
        ]);

        $request->merge([
            'Kind'=>'teacher',
            'password_confirmation' => $request->password        
        ]);

        $content = UserController::store($request);

        Teacher::create([
            'user_id'=>$content['user_id'],
            'subject_id'=>$request->subject_id
        ]);
        return  redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::where('id',$id)->first();
        if(isset($teacher)){
            $user = UserController::show($teacher->user_id);
            $tu = [
                'id' => $teacher->id,
                'user_id' => $teacher->user_id
            ];
            return array_merge($tu,$user);
        }else{
            return response()->json(['message'=>'Teacher not found!'],404);
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
        $teacher = Teacher::where('id',$id)->first();

        if(isset($teacher)){
            UserController::update($request,$teacher->user_id);
            return response()->json(['message'=>'Teacher updated successfully!']);
        }else{
            return response()->json(['message'=>'Teacher not found!'],404);
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
        $teacher = Teacher::where('id',$id)->first();

        if(isset($teacher)){
            UserController::destroy($teacher->user_id);
            $teacher->delete();
            return response()->json(['message'=> 'Teacher deleted successfully!']);
        }else{
            return response()->json(['message'=>'Teacher not found!'],404);
        }
    }

}

