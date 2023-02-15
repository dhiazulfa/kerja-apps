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
        'region_id',
        'subregion_id',
        'title', 
        'slug', 
        'image', 
        'excerpt', 
        'body', 
        'waktu_pekerjaan',
        'status',
        'alamat',
        'link_maps',
        'jumlah_kebutuhan',
        'jam_masuk',
        'jam_selesai',
        'jk_pekerja',
        'tgl_mulai',
        'tgl_selesai', 
        'punishment',
        'price'
    ];
    protected $with = ['client'];


    public function client(){
        return $this->belongsTo(Client::class,'client_id', 'id');
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function subregion(){
        return $this->belongsTo(Subregion::class);
    }


    public function acceptedTask(){
        return $this->belongsTo(AcceptedTask::class);
    }

}
