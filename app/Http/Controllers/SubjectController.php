<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject\subjects',['subjects'=>$subjects]);
    }

    public function create(){
        return view('subject.AddSubject');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => ['required','string','unique:subjects']
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index');

        // return response()->json(['message'=>'Subject added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::where('id',$id)->first();

        if(isset($subject)){
            return $subject;
        }else{
            return response()->json(['message'=>'Subject not found!'],404);
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
        $subject = Subject::where('id',$id)->first();

        if(isset($subject)){
            $subject->update($request->all());
            return response()->json(['message'=>'Subject updated successfully!']);
        }else{
            return response()->json(['message'=>'Subject not found!'],404);
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
        $subject = Subject::where('id',$id)->first();

        if(isset($subject)){
            $subject->delete();
            return response()->json(['message'=> 'Subject deleted successfully!']);
        }else{
            return response()->json(['message'=>'Subject not found!'],404);
        }    
    }
}

