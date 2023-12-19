<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjects::all();
        //$subjects = DB::select ('SELECT * FROM subjects');
        //$subjects = DB::table ('subjects')->get();
        return view ('Users.subjects')->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.subjects_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request,[
            'sub_title'=>'required',
            'sub_room'=>'required'
        ]);
        
        if (!Subjects::create($validatedData)){
            $msg="error";
        } else{
            $msg="success";
        }
        return redirect('/')->with('store_subject',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subjects::find($id);
        return view('Users.subjects_edit',compact('subject')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $this->validate($request,[
            'sub_title'=>'required',
            'sub_room'=>'required'
        ]);
        
        if (!Subjects::whereId($request->id)->update($validatedData)){
            $msg="error";
        } else{
            $msg="success";
        }
        return redirect('/')->with('update_subject',$msg);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subjects::findOrFail($id);
        $subject->delete();
        return redirect('/'); 
    }
}
