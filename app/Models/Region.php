<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['nama_provinsi'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
