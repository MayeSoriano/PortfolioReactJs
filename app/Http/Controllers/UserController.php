<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subjects;
use App\Models\User_Subjects;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Users.users')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.users_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'password' => Hash::make(str::random(10)),
        ]);
        $validatedData = $this->validate($request,[
            'name'=>'required',
            'email'=>'required | email',
            'password'=>'required'
        ]);
        
        if (!User::create($validatedData)){
            $msg="error";
        } else{
            $msg="success";
        }
        return redirect('/users');
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
        $user = User::find($id);
        return view('Users.users_edit',compact('user')); 
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
        $validatedData = $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
        ]);
        
        if (!User::whereId($request->id)->update($validatedData)){
            $msg="error";
        } else{
            $msg="success";
        }
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users'); 
    }
    
    public function user_subjects($id){
        $user_subjects = User::with('subjects')->where ('id',$id)->get();
        return view ('Users\users_subjects')->with(compact('user_subjects'));
    }
    public function add_user_subjects($id)
    {
        $user = User::find($id);
        //get specific id into array
        $selectedSubjects = $user->subjects->pluck('id')->toArray();
        $subjects = Subjects::whereNotIn('id', $selectedSubjects)->get();
    
        return view('Users\users_subjects_add', compact('subjects', 'user'));
    }
    
    public function post_user_subjects(Request $request){
        $subjects = array_keys($request->all());
        $add_subjects = array();
        if (count($subjects)>2){
            for($x=2; $x<count($subjects); $x++){
                array_push($add_subjects,['user_id'=>$request->id,'subject_id'=>$subjects[$x]]);
            }
        }
        User_subjects::insert($add_subjects);
        return redirect ('/user_subjects/'.$request->id);
    }
    public function delete_user_subjects(User $user, Subjects $subjects)
    {
        $user->subjects()->detach($subjects->id);
        return redirect()->back()->with('success', 'User subject deleted successfully');
    }
}
