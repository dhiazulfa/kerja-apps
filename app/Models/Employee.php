<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];
    
    protected $fillable = ['user_id', 'competency_id', 'category_id', 'education_id', 'nik', 'umur', 'image'];
    protected $with = ['competency', 'category', 'education', 'user'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function competency(){
        return $this->belongsTo(Competency::class);
    }

    public function education(){
        return $this->belongsTo(Education::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
