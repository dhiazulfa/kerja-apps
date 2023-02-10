<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'client_id', 
        'title', 
        'slug', 
        'image', 
        'excerpt', 
        'body', 
        'waktu_pekerjaan',
        'status',
        'jam_masuk',
        'jam_selesai',
        'tgl_mulai',
        'tgl_selesai', 
        'punishment',
        'price'
    ];
    protected $with = ['client'];


    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function acceptedTask(){
        return $this->belongsTo(AcceptedTask::class);
    }

}
