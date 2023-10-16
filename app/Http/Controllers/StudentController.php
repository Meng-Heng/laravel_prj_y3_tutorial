<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Session;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index')->with('students', $students);
    }

    // ========================== 
    public function create() {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'gender' => 'required|max:30',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'parent_contact' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('student/create')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Student
        $image = $request->file('image');
        $upload = 'img/';
        $filename = time().$image->getClientOriginalName();
        move_uploaded_file($image->getPathName(), $upload. $filename);

        $students = new Student;
        $students->name = $request->name;
        $students->gender = $request->gender;
        $students->phone = $request->phone;
        $students->address = $request->address;
        $students->image = $filename;
        $students->parent_contact = $request->parent_contact;
        Session::flash('student_created',''. $students->name . ' is created.');
        $students->save();
        return redirect('/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        return view('student.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::find($id);
        return view('student.edit')->with('students', $students);
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
        $validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
            'gender' => 'required|max:30',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'image' => 'mimes:jpg,jpeg,png,gif',
            'parent_contact' => 'required|max:255',
		]);
		if ($validator->fails()) {
			return redirect('student/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The Category
        if($request->file('image') != ""){
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time().$image->getClientOriginalName();
            move_uploaded_file($image->getPathName(), $upload . $filename);
		} 

		$students = Student::find($id);
		$students->name = $request->Input('name');
        $students->gender = $request->Input('gender');
        $students->phone = $request->Input('phone');
        $students->address = $request->Input('address');
        if(isset($filename)){
		    $students->image = $filename;
		}
        $students->parent_contact = $request->Input('parent_contact');
		$students->save();
		Session::flash('student_update',''. $students->name . ' is updated.');
		return redirect('student/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::find($id);
        $students ->delete();
        Session::flash('student_deleted','Student ID: '. $students->id . ' was deleted.');
        return redirect('student');
    }

    public function getBySearch(Request $request) {
        $keyword = !empty($request->input('keyword'))?$request->input('keyword'):"";
        $student = Student::all();
        if( $keyword != ""){
            return view('student.index')
                ->with('students', Student::where('name', 'LIKE', '%'.$keyword.'%')->paginate(4))
                ->with('keyword', $keyword);
        } else {
            return view('student.index')
                ->with('students', Student::paginate(4))
                ->with('keyword', $keyword);
        } 
    }
}
