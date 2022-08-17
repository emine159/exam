<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResultFactory extends Factory
{
    protected $model = Result::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,10),
            'exam_id'=>rand(1,20),
            'point'=>rand(0,100),
            'correct'=>rand(0,20),
            'wrong'=>rand(0,20),
            'blank'=>rand(0,20),
        ];
    }
}
