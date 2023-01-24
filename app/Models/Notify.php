<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['task_id', 'user_id', 'competency_id', 'title', 'body', 'image'];
    protected $with     = ['task','user','competency'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function competency(){
        return $this->belongsTo(Competency::class);
    }
}
