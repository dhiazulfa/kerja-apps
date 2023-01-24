<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['competency_id', 'title', 'slug', 'image', 'excerpt', 'body', 'reward', 'punishment', 'price'];
    protected $with = ['competency'];


    public function competency(){
        return $this->belongsTo(Competency::class);
    }

    public function AcceptedTask(){
        return $this->hasMany(AcceptedTask::class);
    }

}
