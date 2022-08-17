<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question'=>'required|min:3',
            'image'=>'image|nullable|max:1024|mimes:jpg,jpeg,png',
            'answer1'=>'required|min:1',
            'answer2'=>'required|min:1',
            'answer3'=>'nullable|min:1',
            'answer4'=>'nullable|min:1',
            'answer5'=>'nullable|min:1',
            'correct_answer'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'question'=>'Soru',
            'image'=>'Soru Fotoğrafı',
            'answer1'=>'1. Cevap',
            'answer2'=>'2. Cevap',
            'answer3'=>'3. Cevap',
            'answer4'=>'4. Cevap',
            'answer5'=>'5. Cevap',
            'correct_answer'=>'Doğru Cevap'
        ];
    }
}
