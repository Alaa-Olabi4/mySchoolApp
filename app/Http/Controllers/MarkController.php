<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::get();
        $content = [];
        $i = 0;
        foreach ($marks as $m) {
            $student = Student::find($m->student_id);
            $su = User::find($student->user_id);
            $teacher = Teacher::find($m->teacher_id);
            $tu = User::find($teacher->user_id);
            $subject = Subject::find($teacher->subject_id)->name;            
            $content[$i] = array_merge(
                $m->toArray(), 
                ['student' => $su->FirstName . ' ' . $su->LastName], 
                ['teacher' => $tu->FirstName . ' ' . $tu->LastName], 
                ['subject' => $subject]
            );
            $i++;
        }
        return view('mark.marks', ['marks' => $content, 'message' => 'Hi there!']);
    }

    public function indexById($student_id)
    {
        $marks = Mark::where('student_id',$student_id)->get();
        $content = [];
        $i = 0;
        foreach ($marks as $m) {
            $student = Student::find($m->student_id);
            $su = User::find($student->user_id);
            $teacher = Teacher::find($m->teacher_id);
            $tu = User::find($teacher->user_id);
            $subject = Subject::find($teacher->subject_id)->name;            
            $content[$i] = array_merge(
                $m->toArray(), 
                ['student_id' => $student->id],
                ['student' => $su->FirstName . ' ' . $su->LastName], 
                ['teacher' => $tu->FirstName . ' ' . $tu->LastName], 
                ['subject' => $subject]
            );
            $i++;
        }
        return view('mark.marksStudent', ['marks' => $content, 'message' => 'Hi there!']);
    }

    public function create()
    {
        $students=Student::all();$ss=[];$i=0;
        $teachers=Teacher::all();$ts=[];$j=0;

        foreach ($students as $s) {
            $user = User::find($s->user_id);
            $name = $user->FirstName .' '. $user->LastName;
            $ss[$i] =['id'=>$s->id,'name'=>$name];
            $i++;
        }

        foreach ($teachers as $t) {
            $user = User::find($t->user_id);
            $name = $user->FirstName .' '. $user->LastName;
            $ts[$j] = array_merge(['id'=>$t->id,'name'=>$name]);
            $j++;
        }

        return view('mark.addMark',['students'=>$ss,'ss'=>sizeof($ss),'teachers'=>$ts,'ts'=>sizeof($ts)]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'teacher_id' =>['required'],
            'student_id' => 'required|int',
            'value' => 'required|int',
        ]);

        if(Mark::where('teacher_id',$request->teacher_id)->where('student_id',$request->student_id)->first()){
            return response()->json(['message'=>'this mark is entered before!']);
        }

        Mark::create($request->all());
        return redirect()->route('marks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = Mark::where('id', $id)->get();
        return $mark;
    }

    /**
     * Display the mark of specified student .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function marksStudent()
    {
        $auth = Auth::user();
        $user = User::find($auth->id);
        if ($auth && $user->Kind == 'student') {
            $student = Student::where('user_id', $user->id)->first();
            $marks = Mark::where('student_id', $student->id)->get();
            $content = [
                'student_name' => "$user->FirstName" . " " . "$user->LastName",
            ];
            $ms = [];
            foreach ($marks as $mark) {
                $teacher = Teacher::find($mark->teacher_id);
                $subject = Subject::find($teacher->subject_id);
                $ms[$subject->name] = $mark->value;
            }
            $content = array_merge($content, $ms);
            return $content;
        } else {
            return response()->json(['message' => 'Bad request']);
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
        $auth = Auth::user();
        $user = User::find($auth->id);
        $mark = Mark::where('id', $id)->first();

        if (
            $auth && $user->Kind == 'teacher' && $mark
            && $mark->teacher_id == Teacher::where('user_id', $user->id)->first()->id
        ) {
            $mark->update($request->all());
            return response()->json(['message' => 'mark updated successfully!']);
        } else {
            return response()->json(['message' => 'Bad request!']);
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
        $auth = Auth::user();
        $user = User::find($auth->id);
        $mark = Mark::where('id', $id)->first();
        $teacher = Teacher::where('user_id', $user->id)->first();

        if ($mark->teacher_id == $teacher->id) {
            $mark->delete();
            return response()->json(['message' => 'Mark deleted successfully!']);
        }
    }
}
