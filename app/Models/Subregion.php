<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subregion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['nama_kabupaten'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
