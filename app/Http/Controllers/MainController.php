<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use \App\Models\Question;
use \App\Models\Result;


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
        $exam = Exam::whereSlug($slug)->with('my_result', 'results')->withCount('questions')->first() ?? abort(404, 'Sınav Bulunamadı');
        return view('exam_detail', compact('exam'));
    }

    public function result(Request $request, $slug)
    {
        $exam = Exam::whereSlug($slug)->with('questions')->first() ?? abort(404, 'Sınav Bulunamadı');
         
        if($exam->my_result){
            abort(404,"Bu Sınan'a daha önce katıldınız");
        }

        $point = 0;
        $correct = 0;
        $wrong = 0;
        $blank = 0;
        foreach ($request->question as $key => $val) {


            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $key,
                'answer' => $val
            ]);

            $question = Question::find($key);
            if ($question->correct_answer == $val) {
                $correct++;
            } else {
                $wrong++;
            }
        }

        $result = new Result();
        $result->user_id = auth()->user()->id;
        $result->exam_id = $exam->id;
        $result->point = round((100 / count($exam->questions)) * $correct);
        $result->correct = $correct;
        $result->wrong = $wrong;
        $result->blank = count($exam->questions) - ($correct + $wrong);
        $result->save();
        return redirect()->route('dashboard', $exam->slug)->withSuccess("Sınav Başarıyla Tamamlandı");
    }
}
