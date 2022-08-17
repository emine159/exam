<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    use Sluggable;
    use HasFactory;
  
    protected $fillable = ['title', 'description','status','finished_at','slug'];
    protected $dates = ['finished_at'];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }


}
