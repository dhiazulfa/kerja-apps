<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptedTask extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['task_id', 'employee_id', 'status', 'rating', 'catatan_pekerjaan'];
    protected $with = ['task', 'employee'];

    public function employee(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
