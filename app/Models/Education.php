<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Education extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'educations';
    
    protected $guarded  = ['id'];
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return 'slug';
    }

    //For slug
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
