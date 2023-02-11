<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePayment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['rekening_id', 'accepted_id', 'jumlah', 'bukti_pembayaran'];
    //protected $with     = ['acceptedTask','rekening'];

    public function rekening(){
        return $this->belongsTo(Rekening::class);
    }

    public function task(){
        return $this->belongsTo(AcceptedTask::class,'accepted_id','id');
    }
}
