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

    protected $appends = ['details'];

    public function getDetailsAttribute(){
        if($this->results()->count()>0){
  
            return [
                'average'=> round($this->results()->avg('point')),
                'join_count'=> $this->results()->count(),
            ];

        }
        return null;
        
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }


    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }

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
