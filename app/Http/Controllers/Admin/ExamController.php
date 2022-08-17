<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Http\Requests\ExamCreateRequest;
use App\Http\Requests\ExamUpdateRequest;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::withCount('questions');
         if(request()->get('title')){
            $exams = $exams->where('title','LIKE',"%".request()->get('title')."%");
         }

         if(request()->get('status')){
            $exams = $exams->where('status',request()->get('status'));
         }

        $exams = $exams->paginate(10);
        return view('admin.exam.list',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamCreateRequest $request)
    {
        Exam::create($request->post());
        return redirect()->route('exams.index')->withSuccess('Sınav Başarıyla Oluşturuldu');
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
        $exam = Exam::find($id) ?? abort(404,'Sınav Bulunamadı');
        return view('admin.exam.edit',compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamUpdateRequest $request, $id)
    {
        $exam = Exam::find($id) ?? abort(404,'Sınav Bulunamadı');
        Exam::find($id)->update($request->except(['_method','_token']));
        return redirect()->route('exams.index')->withSuccess('Sınav Güncelleme İşlemi Başarılı');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id) ?? abort(404,'Sınav Bulunamadı');
        $exam->delete();
        return redirect()->route('exams.index')->withSuccess('Sınav Silme İşlemi Başarılı');

    }
}
