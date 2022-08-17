<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;



class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $exam = Exam::whereId($id)->with('questions')->first() ?? abort(404, 'Sınav Bulunamadı');
        return view('admin.question.list', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $exam = Exam::find($id);
        $data["exam"] = $exam;
        $data["exam_id"] = $id;
        return view('admin.question.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $id)
    {

        $fileName = "varsayılan";
        if ($request->hasFile('image')) {

            $fileName = Storage::put("public/resimler/$id", $request->image);
            
        }
        $request->merge(['image' => $fileName]);
         
        Exam::find($id)->questions()->create($request->post());
        return redirect()->route('questions.index', $id)->withSuccess('Soru Başarıyla Oluşturuldu');
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
    public function edit($exam_id, $question_id)
    {
        $question = Exam::find($exam_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Sınav veya Soru Bulunamadı');
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $exam_id, $question_id)
    {
        // sorgula ve sil



        if ($request->hasFile('image')) {
            $filename = Storage::put("public/resimler/$exam_id", $request->image);

            // $fileName = str::slug($request->question).'.'.$request->image->extension();
            // $fileNameWithUpload = 'uploads/'.$fileName;
            // $request->image->move(public_path('uploads'),$fileName);
            $request->merge(['image' => $filename]);
        }
        Exam::find($exam_id)->questions()->whereId($question_id)->first()->update($request->post());
        return redirect()->route('questions.index', $exam_id)->withSuccess('Soru Başarıyla Güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam_id, $question_id)
    {
        Exam::find($exam_id)->questions()->whereId($question_id)->delete() ?? abort(404, 'Soru Bulunamadı');
        return redirect()->route('questions.index', $exam_id)->withSuccess('Soru Silme İşlemi Başarılı');
    }
}
