<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function dashboard()
    {
        $exams = Exam::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('exams'));
    }

    public function exam($slug)
    {
        $exam = Exam::whereSlug($slug)->with('questions')->first();
        return view('exam', compact('exam'));
    }

    public function exam_detail($slug)
    {
        $exam = Exam::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'Sınav Bulunamadı');
        return view('exam_detail', compact('exam'));
    }

    public function result(Request $request, $slug)
    {
        $exam = Exam::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Sınav Bulunamadı');

        foreach ($request->question as $key => $val) {

            $q = Answer::where([
                'user_id' => auth()->user()->id,
                'question_id' => $key,
            ])->first();
            if (!isset($q->id)) {
                Answer::create([
                    'user_id' => auth()->user()->id,
                    'question_id' => $key,
                    'answer' => $val
                ]);
            }
        }
    }
}
