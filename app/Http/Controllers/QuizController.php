<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_quiz;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbl_quizzes = tbl_quiz::all();
        return view('quiz.index')->with('tbl_quizzes', $tbl_quizzes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50|min:10',
            'description' => 'required|max:255|min:10',
            'date' => 'required|max:50'
        ]);
        // Create The Category
        $quiz = new tbl_quiz;
        $quiz->title = $request->title;
        $quiz->description = $request->description;
        $quiz->date = $request->date;
        Session::flash('quiz_created','A Quiz has been created.');
        $quiz->save();
        return redirect('/quiz');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = tbl_quiz::findOrFail($id);
        return view('quiz.show')->with('quiz', $quiz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = tbl_quiz::find($id);
        return view('quiz.edit')->with('quiz', $quiz);
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
			'title' => 'required|max:50|min:3',
            'description' => 'required|max:255|min:10',
            'date' => 'required|max:50'
		]);
		if ($validator->fails()) {
			return redirect('quiz/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The Category
		$quiz = tbl_quiz::find($id);
		$quiz->title = $request->Input('title');
        $quiz->description = $request->Input('description');
        $quiz->date = $request->Input('date');
		$quiz->save();
		Session::flash('quiz_update','Quiz has been updated.');
		return redirect('quiz/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = tbl_quiz::find($id);
        $quiz->delete();
        Session::flash('quiz_deleted','Quiz '. $quiz->id . ' was deleted.');
        return redirect('quiz');
    }

    public function getBySearch(Request $request) {
        $keyword = !empty($request->input('keyword'))?$request->input('keyword'):"";
        $quiz = tbl_quiz::all();
        if( $keyword != ""){
            return view('quiz.index')
                ->with('tbl_quizzes', tbl_quiz::where('title', 'LIKE', '%'.$keyword.'%')->paginate(4))
                ->with('keyword', $keyword);
        } else {
            return view('quiz.index')
                ->with('tbl_quizzes', tbl_quiz::paginate(4))
                ->with('keyword', $keyword);
        } 
    }
}
