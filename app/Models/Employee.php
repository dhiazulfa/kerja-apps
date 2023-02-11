<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];
    
    protected $fillable = [
        'user_id',  
        'education_id', 
        'nik',
        'alamat_ktp',
        'alamat_domisili',
        'status_pernikahan',
        'jenis_kelamin',
        'pengalaman_kerja',
        'umur',
        'tgl_lahir',
        'foto_ktp', 
        'foto_kk',
        'foto_sertifikat_pengalaman',
        'foto_ijazah_terakhir',
    
    ];
    protected $with = ['education', 'user'];

    public function education(){
        return $this->belongsTo(Education::class);
    }

    public function acceptedTask(){
        return $this->belongsTo(AcceptedTask::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rekening(){
        return $this->hasMany(Rekening::class);
    }
}
