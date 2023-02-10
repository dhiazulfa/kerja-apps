<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $guarded  = ['id'];
    protected $with = ['user'];

    protected $fillable = [
        'user_id',  
        'nib', 
        'alamat',
        'jenis_kelamin',
        'logo', 
        'foto_kantor',
        'foto_nib',
        'kategori_bisnis'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }
}
