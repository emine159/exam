<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'exam_id'=>rand(1,10),
            'question'=>$this->faker->sentence(rand(3,7)),
            'answer1'=>$this->faker->sentence(rand(1,5)),
            'answer2'=>$this->faker->sentence(rand(1,5)),
            'answer3'=>$this->faker->sentence(rand(1,5)),
            'answer4'=>$this->faker->sentence(rand(1,5)),
            'answer5'=>$this->faker->sentence(rand(1,5)),
            'correct_answer'=>'answer'.rand(1,5)
        ];
    }
}
