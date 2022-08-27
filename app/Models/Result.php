<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $filleble =['user_id','exam_id','point','correct','wrong','blank'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
