<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcceptedTask extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['task_id', 'user_id', 'status', 'image'];
    protected $with = ['task', 'user'];
}
